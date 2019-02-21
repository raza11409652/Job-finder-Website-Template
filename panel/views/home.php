<?php
    include_once   "includes/header.php";

   if(isset($_SESSION) && isset($_SESSION['currentUser']) && isset($_SESSION['loggedIn'])==true)
   {
    header('Location: ?v=dash');
   }else{
       #user is not logged In
     #  die(header('Location: '.$_SERVER['PHP_SELF'])); 
   }
?>
    <section class="login-wrapper">
    
        <div class="login">
        <div class="logo-wrapper"> <img src="../assets/image/logo.png" alt=""></div>
            <form action="#" method="POST" id="login_form" autocomplete="off">
                <span class="login100-form-title p-b-32">
                                Account Login
                </span>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="abc@xyz.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control"  required placeholder="your password">
                </div>
                <center><div class="loader hide"></div></center>
                <div class="form-group">
                <button class="btn btn-admin-primary btn-block">login</button>
                </div>
                <div class="form-group"> 
                    <p class="text-center"><a href="?v=forgetPassword" class="btn btn-outline-danger">Forget Password ?</a></p>
                </div>
            </form>
        </div>
        
    </section>

<?php
    include_once "includes/footer.php";
?>    
