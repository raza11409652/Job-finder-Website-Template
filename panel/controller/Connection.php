<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

date_default_timezone_set("Asia/Kolkata");

class Connection{
    protected $servername="localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "job";
    function __construct(){

    }
    function getConnect(){
        $conn =mysqli_connect($this->servername , $this->username ,$this->password ,$this->dbname);
        if($conn)
        {
           # echo "Connection Established";
            return $conn;
        }
        else{
            die("Connection Failed:".mysqli_error());
        }
    }
    
}        


?>