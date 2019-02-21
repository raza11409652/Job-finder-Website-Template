<?php
$success="";
    if(isset($_POST['updateProfile']))
    {
       # echo "upadte";
        $id=null;
       $fname=$_POST['fname'];
       $lname=$_POST['lname'];
       $email=$_POST['email'];
       $mobile=$_POST['mobile'];
      # echo $fname.$lname.$email.$mobile;


      $currentUser=$_SESSION['currentUser'];
      #fetch ID
      $sql ="select panel_id from panel where panel_email='$currentUser'";
      $res=mysqli_query($connectionGlobal , $sql);
      $count=mysqli_num_rows($res);
      if($count ==1)
      {
          $data=mysqli_fetch_array($res);
          $id=$data['panel_id'];
          #echo $id;
      }


      //now update all the data with new data or fetched data;
      $update="update panel set panel_f_name='$fname' , panel_l_name='$lname',
        panel_email='$email',panel_mobile='$mobile' where panel_id='$id'
      ";
      $resUpdate=mysqli_query($connectionGlobal , $update);
      if($resUpdate)
      {
       #clear Haeder
       #set success Message

       $_SESSION['currentUser']=$email;
       
   echo"<script>
   const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  toast({
    type: 'success',
    title: 'Profile Has been Updated'
  });
           setTimeout(function(){
              //set local storage variable email for current Email
              
            window.location.replace('?v=profile');
          },1000);
          
       </script>";
       
    
      #die(header());
          
      # die(header('Location: '.$_SERVER['REQUEST_URI'])); 
      }
      else{
        
      }
    }
?>