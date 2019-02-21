<?php
include_once "includes/header.php"; 
?>
<section class="forget-wrapper">
    <div class="forget card-custom">
        <div class="logo-wrapper"> <img src="../assets/image/logo.png" alt=""></div>

        <div class="header-text">Set New Password</div>
        <form action="#" id="passwordResetForm" method="post">
            <div class="form-group">
                <label for="">
                    <i class="fas fa-lock"></i> Enter new password
                </label>
                <input type="password" required name="password" id="password" class="form-control">
            </div>
            <input type="text" name="email" value="<?php echo $_GET['email']?>" hidden>
            <input type="text" name="token" value="<?php echo $_GET['otp']?>" hidden>
            <div class="form-group">
                <label for="">
                        <i class="fas fa-lock"></i> Enter confirm password
                    </label>
                <input type="password" required name="conPassword" id="conPassword" class="form-control">
            </div>
            <center><div class="loader hide"></div></center>
            <div class="form-group">
                <button class="btn btn-block btn-admin-primary">
                    SAVE
                </button>
            </div>

       </form>
    <div class="row">
        <div class="col-md-4">
            <a href="./" class="btn btn-outline-danger btn-block">Login</a>
        </div>        
        <div class="col-md-8" >
             <a href="?v=forgetPassword" class="btn btn-outline-warning btn-block">Resend Verification URL</a>
        </div>
    </div>
</div>

    
                    
</section>
<?php
include_once   "includes/footer.php";
?>