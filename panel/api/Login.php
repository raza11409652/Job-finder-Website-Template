<?php
#all includes goes here
include_once    "../controller/Connection.php";
include_once "../controller/Encryption.php";
session_start();
class Login{
    protected  $connection;
    public $ip;
    function __construct(){
        #default constructor to call connection method and create DB connection for further uses.
        $connect = new Connection(); #creating object for Connection Class
        $this->connection =$connect->getConnect();
        #var_dump($this->connection);

    }
    function getUserIP(){
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
    function checkUser($email)
    {
        /**
         * chechk whther this email is registerd or not
         * 
         */

         $sql="select * from panel where panel_email = '$email'";
         $res= mysqli_query($this->connection , $sql);
         $count=mysqli_num_rows($res);
         if($count == 1)
         {
             return true;
         }
        return false;
    }
    function createLog($email,$ip , $loginStatus)
    {
        #writing into csv format 
        //create log each time user login to system
        $list = array(
           "". $email .",".$ip .",". $loginStatus .",".date("Y-m-d h:i:sa").""
        );
        $file = fopen("../logs.csv","a");
        foreach($list as $line)
        {
            fputcsv($file , explode(',',$line));
        }
       # return false;
    }
    function doLogin($email , $password)
    {   
        /**
         * if all the requirement is fullfilled start
         * login user to enter into system
         * else return false;
         */
       $sql = "select * from panel where panel_email='$email' && panel_password='$password'";
       $res=mysqli_query($this->connection , $sql);
       $count=mysqli_num_rows($res);
       if($count ==1)
       {
           $fetch=mysqli_fetch_array($res);
           $password_fetch=$fetch['panel_password'];
           if($password == $password_fetch){
           //check for privilged Access
           /**
            * whether email is valid for using Admin Account or not
            */
                return true;
                 }
       }
       
        return false;
    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    #echo $email .$password;
    #create object for login 
    $login = new Login();
    #create object for encryption
    $encrypt = new Encryption();
    $password=$encrypt->sha512($password);
    #echo($password);
    $login->ip=$login->getUserIP();
    if($login->checkUser($email) == true)
    {
       # 
       if( $login->doLogin($email , $password) ==true)
       {
           $success=array("Success"=>"Login Success");
          
           $login->createLog($email    , $login->ip , 'true');
           //session handling goes here
           /**
            * session will store current user position and their Email Address
            */
            $_SESSION['loggedIn']=true;
            $_SESSION['currentUser']=$email;
            echo json_encode($success);
       }else{
        $error = array ("Error"=>"Login Failed");
        echo json_encode($error); 
       }

    }else{
        $login->createLog($email    , $login->ip , 'false');
        $error = array ("Error"=>"This Email is not a valid email to access this portal");
        echo json_encode($error);
    }

}
else{
    $error=array("Error"=>"This is an API Call ,  Requirement is not full filled to Make Login Call");
    echo json_encode($error);
}

?>