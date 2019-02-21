<?php
#all includes goes here
include_once    "../controller/Connection.php";
include_once "../controller/Encryption.php";
include_once "SendMail.php";
session_start();
class ForgetPsd{
    protected $connect;
    public $ip,$OTP;
    function __construct()
    {
        $connect = new Connection(); #creating object for Connection Class
        $this->connect =$connect->getConnect(); 
        
        
    }
    function checkEmailExist($email){
        $query="select * from panel where panel_email='$email'";
        $res=mysqli_query($this->connect,$query);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            return true;
        }else{
            return false;
        }
        return false;
    }
    
    function generateOtp(){
        $this->OTP=mt_rand(10000,99999);   
    }
    function getCurrentUserId($email){
        $sql="select panel_id from panel where panel_email='$email' ";
        $res=mysqli_query($this->connect , $sql);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            $data= mysqli_fetch_assoc($res);
            $id=$data['panel_id'];
            return $id;
        }
        return 0;
    }
    function storeOTP($id , $otp)
    {   $sql="";
        #check whether their is any entry with this id if it exist update the otp entry and 
        #if their is no entry only insert statement will run
        $query="select * from otp where otp_ref='$id'";
        $res=mysqli_query($this->connect , $query);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            #update
            $sql="update otp set otp_value='$otp' where otp_ref='$id'"; 
            
        }else if($count ==0)
        {
            #insert
            $sql="insert into otp (otp_value,otp_ref) values ('$otp' ,'$id')";
        }
        if(!empty($sql))
        {
            $res=mysqli_query($this->connect , $sql);
            if($res)
            {
                return true;
            }
            
        }else{
            return false;
        }

        return false;
    }
    function valid_email($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }

} 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email=$_POST['email'];
   #$email=mysqli_real_escape_string($email);
    $email=trim($email);
    #verify email expression
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error=array("Error"=>"Email Format is not valid ");
        echo json_encode($error); 
      }else{
        #create object for ForgetPsd class
        $objectForgetPsd=new ForgetPsd();
        $objectEnc=new Encryption();
        if($objectForgetPsd->valid_email($email)==true)
        {
            if($objectForgetPsd->checkEmailExist($email)==true){
                        #generate OTP
                        $objectForgetPsd->generateOtp();
                if($objectForgetPsd->OTP!=null)
                {
                    #get id for email
                    $id=$objectForgetPsd->getCurrentUserId($email);
                    #encrypt it and store it in database 

                    $objectForgetPsd->OTP=$objectEnc->b_crypt($objectForgetPsd->OTP);

                    if($objectForgetPsd->storeOTP($id , $objectForgetPsd->OTP) == true)
                    {
                            #send Mail to email
                          $objectSendMail=new SendMail(); 
                          #create html body for email
                        $url="http://".$_SERVER['HTTP_HOST']."/job/panel/index.php?v=resetPassword&email=".$email."&otp=".$objectForgetPsd->OTP."";

                           if($objectSendMail->mailSender($email,"Your Password Reset Link",$url) ==true )
                           {
                            #before sucess message Make User notify with Email for Password Change
                                $succ = array ("Success"=>"Password Reset Link Has Been Mailed To You !!!");
                                echo json_encode($succ);
                           }
                           else{
                            $error=array("Error"=>"Error in Sending Email !!! ");
                            echo json_encode($error);
                           }


                    }
                    else{
                        $error=array("Error"=>"Try Again By Reloading the Browser !!! ");
                        echo json_encode($error); 
                    }
                    
                }
            }else{
                $error=array("Error"=>"Email is not registerd with us ");
                echo json_encode($error); 
            }
        }else{
            $error=array("Error"=>"Email Format is not valid ");
            echo json_encode($error);
        }
      }

} else{
    $error=array("Error"=>"This is an API Call ,  Requirement is not full filled to Make forget Password  Call");
    echo json_encode($error);
}
?>
