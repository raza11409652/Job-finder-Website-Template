<?php
#created by hackdroid
#all includes goes here
include_once    "../controller/Connection.php";
include_once "../controller/Encryption.php";
session_start();
class PasswordChange{
    protected  $connection;
    public $ip,$currentUser;
    function __construct(){
        #default constructor to call connection method and create DB connection for further uses.
        $connect = new Connection(); #creating object for Connection Class
        $this->connection =$connect->getConnect();
        #var_dump($this->connection);
        $this->currentUser= $_SESSION['currentUser'];
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
 
    function changePassword($newPass,$id)
    {
        $query= "update panel set panel_password='$newPass' where panel_id='$id'";
        $res= mysqli_query($this->connection , $query);
        if($res)
        {
            return true;
        }
        else{
            return false;
        }


        return false;
    }
    function oldPassVerify($oldPass , $id){
        $query="select * from panel where panel_id='$id' && panel_password='$oldPass'";
        $res=mysqli_query($this->connection , $query);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            $data=mysqli_fetch_assoc($res);
            if($oldPass==$data['panel_password'])
            {
                return true;
            }
            else{
                return false;
            }
        }
        return false;
    }
    function passValidate($oldPass, $newPass){
        if($oldPass == $newPass)
        {
            return false;
        }else{
            return true;
        }

    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    #create object for Password Change Class
    $passChange= new PasswordChange();
    #create object for encryption
    $encrypt = new Encryption();
    $id=$passChange->getCurrentUserId($passChange->currentUser);
    $oldPass=$_POST['password'];
    $oldPass=$encrypt->sha512($oldPass);
    $newPass=$_POST['newPassword'];
    $newPass=$encrypt->sha512($newPass);
    #first verify Old Password Enterd is correct or not with current Logged in User =true
    if($passChange->oldPassVerify($oldPass , $id)==true)
    {
        if($passChange->passValidate($oldPass , $newPass) == true)
        {
            if($passChange->changePassword($newPass , $id)==true)
            {
                #before sucess message Make User notify with Email for Password Change
                $succ = array ("Success"=>"Password Has been Successfully Chnaged");
                echo json_encode($succ);
            }else{
                $error = array ("Error"=>"Some Error Occured Try Again");
                echo json_encode($error);
            }
        }else{
        $error = array ("Error"=>"Old Password and New Password Can't be Same Try Some New Password");
        echo json_encode($error);
        }
    }else{
        $error = array ("Error"=>"Current Password Doesn't Match");
        echo json_encode($error); 
    }

} else{
    $error=array("Error"=>"This is an API Call ,  Requirement is not full filled to Make Password Change Call");
    echo json_encode($error);
}
?>