<?php
#all includes goes here
include_once    "../controller/Connection.php";
include_once "../controller/Encryption.php";
session_start();
class RESET{
    public $currentUserId,$ip;
    protected $connection;
    function __construct()
    {
        #default constructor to call connection method and create DB connection for further uses.
        $connect = new Connection(); #creating object for Connection Class
        $this->connection =$connect->getConnect();
        #var_dump($this->connection);
    }
    function valid_email($str) {
        #echo $str;
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }

    function validRequest($id , $token){
        $query="select * from otp where otp_value='$token' && otp_ref='$id'";
        #echo $query;
        $res=mysqli_query($this->connection , $query);
        $count=mysqli_num_rows($res);
        #echo $count;
        if($count==1)
        {
            return true;
        }
        return false;
    }
    function getCurrentUserId($email){
        $sql="select panel_id from panel where panel_email='$email' ";
        $res=mysqli_query($this->connection , $sql);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            $data= mysqli_fetch_assoc($res);
            $id=$data['panel_id'];
            return $id;
        }
        return 0;
    }
    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }  
    function deletetoken($id)
    {
        $query="delete  from otp where otp_ref='$id'";
        $res=mysqli_query($this->connection , $query);
        if($res)
        {
            return true;
        }
        return false;
    }
    function resetPassword($password , $id){    
        $query="update panel set panel_password='$password' where panel_id='$id'";
        $res=mysqli_query($this->connection , $query);
        if($res)
        {
            return true;

        }
            return false;

    }  
    function checkPassword($pass , $confirmPassword)
    {
        if($pass == $confirmPassword)
        {
            return true;
        }
        return false;
    }
    function passwordStrength($str)
    {
        if (preg_match("/^[a-zA-Z][0-9a-zA-Z_!$@#^&]{5,20}$/", $str))
        return true;
    else
        return false;
    }

}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $token=$_POST['token'];
    $email=trim($_POST['email']);
    $password=$_POST['password'];
    $confirmPassword=$_POST['conPassword'];
    #create object for Reset class
    $objectReset=new RESET();
    $objectEnc= new Encryption();
    $password=$objectEnc->sha512($password);
    $confirmPassword=$objectEnc->sha512($confirmPassword);
    if($objectReset->valid_email($email)==true)
    {
       #check for valid request
       $objectReset->currentUserId=$objectReset->getCurrentUserId($email);
       if($objectReset->validRequest($objectReset->currentUserId , $token) == true)
       {
           #verify password strength

           #reset Password and delete this token
            if($objectReset->checkPassword($password , $confirmPassword) == true)
            {   #var_dump($objectReset->passwordStrength($password));

                if($objectReset->resetPassword($password , $objectReset->currentUserId) == true)
                        {
                        if($objectReset->deletetoken($objectReset->currentUserId)==true)
                        {
                            $error=array("Success"=>"Password Has been Reset ");

                            if(isset($_SESSION) && isset($_SESSION['currentUser']) && isset($_SESSION['loggedIn'])==true)
                            {
                             session_destroy();
                             $_SESSION['loggedIn']=false;
                            }else{
                                #user is not logged In
                               # die(header('Location: '.$_SERVER['PHP_SELF'])); 
                            }

                            echo json_encode($error); 
                        }else{
                            $error=array("Error"=>"Error in delete");
                        echo json_encode($error);
                        }
                    }else{
                        $error=array("Error"=>"Error");
                        echo json_encode($error);
                    }
                /**
                 * 
                 * 
                 */
            }else{
                $error=array("Error"=>"Password doesn't Match");
                echo json_encode($error);
            }
       } else{
        $error=array("Error"=>"Invalid Url Request Please Try Again");
        echo json_encode($error);
       }
    }
    else{
        $error=array("Error"=>"Email is not valid");
        echo json_encode($error);
    }
   
}
else{
    $error=array("Error"=>"This is an API Call ,  Requirement is not full filled to Make forget Password  Call");
    echo json_encode($error);
} 
?>