<?php
    include_once "includes/header.php";

?>
<section class="forget-wrapper">
    <div class="forget">
    <div class="logo-wrapper"> <img src="../assets/image/logo.png" alt=""></div>
        <form action="#" method="post" id="forgetEmail">
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Enter Email</label>
                <input type="email" required name="email" class="form-control" id="email" placeholder="Enter Your Registerd Email">
            </div>
            <center><div class="loader hide"></div></center>
            <div class="form-group">
              <button type="submit" class="btn btn-outline-admin-primary btn-block">  <i class="fas fa-paper-plane"></i> Send Recovery Email</button>
            </div>
        </form>
        <a href="./" class="btn  btn-outline-danger  btn-block"> <i class="fas fa-lock"></i> Login</a>
    </div>
    
                    
</section>

<?php
    include_once "includes/footer.php";
?>