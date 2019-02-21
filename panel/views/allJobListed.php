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
       <div class="container padding-top">
            <div class="card-custom-pass">
                <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Profile</th>
                                <th>Total Vacancy</th>
                                <th>Job Posted On</th>
                                <th>Job Posted By</th>
                                <th>Action<th
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Xyz
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    date
                                </td>
                                <td>
                                    Md Khalid
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                </table>   
            </div>
       </div>

       </div>
</section>
<?php
include_once "includes/footer.php";
?>