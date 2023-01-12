<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
 $eid=$_POST['eid'];
 $subname=$_POST['subname'];
 $facultyname=$_POST['facultyname='];
 $deptname=$_POST['deptname'];
 $sem=$_POST['sem'];
 $subcode=$_POST['subcode'];
 $examdate=$_POST['examdate'];
 $camark=$_POST['camark'];
 $fmark=$_POST['fmark'];

 $ret="select ExamID from tblexam where  EID=:eid";
 $query= $dbh -> prepare($ret);

$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$extension = substr($image,strlen($image)-4,strlen($image));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$image=md5($image).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$image);
$sql="insert into tblexam(ExamID,SubjectName,Faculty,Department,Semester,SubjectCode,ExamDate,CAMark,FinalExamMark,Image)values(:eid,:subname,:facultyname,:deptname,:sem,:subcode,:examdate,:camark,:fmark)";
$query=$dbh->prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->bindParam(':subname',$subname,PDO::PARAM_STR);
$query->bindParam(':facultyname',$facultyname,PDO::PARAM_STR);
$query->bindParam(':depname',$deptname,PDO::PARAM_STR);
$query->bindParam(':sem',$stuclass,PDO::PARAM_STR);
$query->bindParam(':subcode',$subcode,PDO::PARAM_STR);
$query->bindParam(':examdate',$examdate,PDO::PARAM_STR);
$query->bindParam(':camark',$camark,PDO::PARAM_STR);
$query->bindParam(':fmark',$fmark,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Exam Detail has been added.")</script>';
echo "<script>window.location.href ='add-exam-detail.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}}

else
{

echo "<script>alert('Username or Student Id  already exist. Please try again');</script>";
}
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Skill Hub|| Add Exam Details</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
             <!-- <h3 class="page-title"> Add Faculty </h3>-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                 <li class="breadcrumb-item active" aria-current="page"> Add Exam Details</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Exam Details</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName1">Exam ID</label>
                        <input type="text" name="eid" value="" class="form-control" required='true'>
                      </div>
                     <div class="form-group">
                        <label for="exampleInputName1">Subject Name</label>
                        <input type="text" name="subname" value="" class="form-control" required='true'>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Faculty Name</label>
                        <input type="text" name="facultyname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Department Name</label>
                        <input type="text" name="deptname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Semester</label>
                        <input type="text" name="sem" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Subject Code</label>
                        <input type="text" name="subcode" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Exam Date</label>
                        <input type="date" name="examdate" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">CA Marks</label>
                        <input type="text" name="camark" value="" class="form-control" required='true'>
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Final Exam Marks</label>
                        <input type="text" name="fmark" value="" class="form-control" required='true'>
                      </div>
                      
                     
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>