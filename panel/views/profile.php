<?php
include_once "includes/header.php";
include_once "includes/profileHandler.php";
include_once "includes/profileUpdater.php";
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
            #echo $_SESSION['currentUser'];
            
        ?>

        <div class="container padding-top">
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?v=dash">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
             </nav>

           <div class="card-custom">
                <form method="POST" action="#" >
                <div class="row">
                    <div class="col-md-6">
                        <label for="first-name"> <i class="fa fa-user"></i> First Name</label>
                        <input type="text" name="fname" required class="form-control" id="first-name" value="<?php  echo $fname;?>">
                    </div>
                    <div class="col-md-6">
                        <label for="last-name"><i class="fa fa-user"></i> Last Name</label>
                        <input type="text" name="lname" required class="form-control" id="last-name" value="<?php echo $lname ?>">
                    </div>
                </div><!--row-->
                <div class="row padding-top">
                    <div class="col-md-6">
                        <label for="email"> <i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="email" required class="form-control" id="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="mobile"> <i class="fas fa-mobile"></i> Mobile</label>
                        <input type="number" name="mobile" required class="form-control" id="mobile" value="<?php echo $mobile ?>">
                    </div>
                </div><!--row-->
                <div class="form-group padding-top">
                    <button class="btn btn-danger" name="updateProfile">Update</button>
                </div>
                </form>
           </div>  
           <div class="card-custom-pass margin-top">
               <div class="header-text">   <i class="fas fa-lock"></i> Update Password</div>
               <form action="#" id="password-update" method="post">
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" required class="form-control" name="password" placeholder="Enter Your Current Password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" required class="form-control" name="newPassword" placeholder="Enter New Password">
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-admin-secondary">Update</button>
                </div>
               </form>
           </div>  
        </div>
    </div>
</section>
<?php
include_once "includes/footer.php";
?>