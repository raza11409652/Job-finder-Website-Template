<?php
   if(isset($_SESSION) && isset($_SESSION['currentUser']) && isset($_SESSION['loggedIn'])==true)
   {
    
   }else{
       #user is not logged In
       die(header('Location: '.$_SERVER['PHP_SELF'])); 
   }
?>