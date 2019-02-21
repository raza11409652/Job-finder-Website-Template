<?php
include_once "includes/header.php";
?>
<section class="dash-wrapper">
   <div class="left">
        <?php
            include_once "includes/sidemenu.php"; 
        ?>
    </div>
   <div class="right">
        <?php
            include_once "includes/nav.php"; 
        ?>
        <div class="container padding-top">
            <!-- Msg 91 API 125859A41atJaHbk0D5c028bb8 -->
            <div class="card-custom">
                <div class="header-text">API Configuration</div><hr>
                <div class="form-group">
                    <label for="msg91value">MSG 91 API Key</label>
                    <input type="text" id="msg91value" class="form-control" value="125859A41atJaHbk0D5c028bb8">
                </div>
                <div class="form-group">
                    <button class="btn btn-admin-primary">Update</button>
                </div>
                <h6>Gmail SMTP Configuration</h6><hr>
                <div class="form-group">
                    
                    <label for="emailSmtp"> <i class="fa fa-envelope"></i> Email</label>
                    <input type="email" class="form-control" value="md.khalid@gmail.com">
                </div>
                <div class="form-group">
                    <label for="passSmtp"><i class="fas fa-lock"></i> Password</label>
                    <input type="password"  id="passSmtp" class="form-control" placeholder="SMTP password" value="khalid">
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-danger">Save</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once "includes/footer.php";
?>