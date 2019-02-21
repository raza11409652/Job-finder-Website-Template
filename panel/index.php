<?php
session_start();
function checkFileExist($path){
        if(file_exists($path))
        {
            require_once $path;
        }
        else{
            require "views/home.php";
        }
    }


    if(isset($_REQUEST['v']))
    {
        $url=$_REQUEST['v'];
        $path="views/".$url.".php";
        checkFileExist($path);
    }else{
        $path="views/home.php";
        checkFileExist($path);
    }
    #echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    #echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];



?>