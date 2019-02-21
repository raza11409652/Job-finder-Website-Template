<?php
    $url="";    
    function checkUrlExist($path)
    {   
        if(file_exists($path))
        {
            require $path;
        }
        else{
            require "view/error.php";
        }
    }
    if(isset($_REQUEST['v']))
    {
        $url="view/".$_REQUEST['v'].".php";
        
    }
    else{
        $url="view/home.php";
    }
    checkUrlExist($url);
?>