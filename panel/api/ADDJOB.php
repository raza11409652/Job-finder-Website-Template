<?php
include_once    "../controller/Connection.php";
session_start();
    class ADDJOB{
        protected $connection,$currentUserId,$currentEmail;

        function __construct()
        {
            $connect = new Connection(); #creating object for Connection Class
            $this->connection =$connect->getConnect();
            $this->currentEmail=$_SESSION['currentUser'];
        }
        function getCurrentUserId($email){
            $sql="select panel_id from panel where panel_email='$email' ";
            $res=mysqli_query($this->connection , $sql);
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                $data= mysqli_fetch_assoc($res);
                $id=$data['panel_id'];
                return $id;
            }
            return 0;
        }
        function addNewJob($jp,$jc,$loc,$tv,$jd,$je){
            $this->currentUserId=$this->getCurrentUserId($this->currentEmail);
           # echo $this->currentUserId;
           $date=date("Y-m-d h:i:sa");
            $query="Insert into job_entry (job_entry_profile,job_entry_com_name,job_entry_location,
            job_entry_total_vac,
            job_entry_desc,job_entry_elig,job_entry_posted_on,job_entry_posted_by)values
            ('$jp','$jc','$loc','$tv','$jd','$je','$date','$this->currentUserId')";
           $res=mysqli_query($this->connection , $query);
           if($res)
           {
               return true;
           }
           return false;
        }

    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $jobProfile=trim($_POST['jobProfile']);
        $jobCompanyName=trim($_POST['jobCompanyName']);
        $location=trim($_POST['location']);
        $totalVacancy=trim($_POST['totalVacancy']);
        $jobDesc=trim($_POST['jobDesc']);
        $jobElig=trim($_POST['jobElig']);
        #craete object for ADDJOB
        $objectAddJob= new ADDJOB();
        if($objectAddJob->addNewJob($jobProfile,$jobCompanyName,$location,$totalVacancy,$jobDesc,$jobElig)==true)
        {
            $succ=array("Success"=>"New Job Has been Posted");
            echo json_encode($succ);
        }else{
            $error=array("Error"=>"Error While inserting new Data");
            echo json_encode($error);  
        }

    }
    else{
        $error=array("Error"=>"This is an API Call ,  Requirement is not full filled to addJOb  Call");
        echo json_encode($error);
    }

?>