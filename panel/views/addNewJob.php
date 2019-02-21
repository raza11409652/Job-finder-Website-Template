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

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?v=dash">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Job Entry</li>
                </ol>
             </nav>
         <form action="#" method="POST" id="newJobForm">
         <div class="newjobform-wrapper">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                            <input type="text" name="jobProfile" required id="jobProfile" class="form-control data-user" placeholder="Job Profile">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="jobCompanyName" required id="jobCompanyName" class="form-control data-user" placeholder="Company Name">
                     </div>
                  </div>
              </div>
              <!--row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" required name="location" class="form-control" placeholder="Enter Location" Value="TATA STEEL Jamshedpur Jharkhand" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" name="totalVacancy" required id="totalVacancy" class="form-control data-user" placeholder="Total Vacancy">
                        </div>
                    </div>
                </div>
             <!--row-->
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <textarea name="jobDesc" required class="form-control data-user" id="jobDesc" cols="30" rows="10" placeholder="Job Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="jobElig" required class="form-control data-user"  id="jobElig" cols="30" rows="10" placeholder="Job Eligibility"></textarea>
                        </div>
                </div>
             </div>
            <div class="float-right">
                    <button type="submit" class="btn btn-danger">Save</button>
            </div>

              
          </div>
         </form>
        </div>


    </div><!--right-->
</section>
<?php
include_once "includes/footer.php";
?>