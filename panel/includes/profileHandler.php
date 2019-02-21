<?php 
        $currentEmail=$_SESSION['currentUser'];
       #validate current Email and fetch 
       $sql="select * from panel where panel_email='$currentEmail'";
       $res=mysqli_query($connectionGlobal , $sql);
      $count=mysqli_num_rows($res);
      if($count ==1)
      {
          $fetch=mysqli_fetch_array($res);
        $fname=$fetch['panel_f_name'];
        $lname=$fetch['panel_l_name'];
        $email=$fetch['panel_email'];
        $mobile=$fetch['panel_mobile'];
      }
?>