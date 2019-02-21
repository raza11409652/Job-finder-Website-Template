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


           # echo  $_SESSION['currentUser'];
        ?>


        <div class="container padding-top dash">
            <div class="row">
                <div class="col-md-6">
                <div class="card bg-dark text-white">
                        <div class="card-body">
                                    <h4 class="text-center">12</h4>
                                    <p class="text-center text-uppercase">Total Staff
                                    </p> 
                                   <div class="row">
                                       <div class="col-md-3">
                                           &nbsp;
                                       </div>
                                       <div class="col-md-6">
                                            <a href="?v=allJobListed" class="btn btn-outline-warning btn-block">
                                                <i class="fas fa-search"></i>    
                                            List All</a>
                                       </div>
                                   </div>  
                            </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div><!--row1-->
        </div>
    </div>
</section>
<?php
include_once "includes/footer.php";
?>