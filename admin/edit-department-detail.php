<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
 $deptid=$_POST['deptid'];
 $deptname=$_POST['deptname'];
 $depthead=$_POST['depthead'];
 $deptemail=$_POST['deptemail'];
 $image=$_FILES["image"]["name"];
 $ret="select DepartmentName from tbldepartment where DepartmentName=:deptname || DepartmentID=:deptid";
 $query= $dbh -> prepare($ret);
$query->bindParam(':deptname',$deptname,PDO::PARAM_STR);
$query->bindParam(':deptid',$deptid,PDO::PARAM_STR);
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
$sql="insert into tbldepartment(DepartmentID,DepartmentName,HeadoftheDepartment,DepartmentEmail,Image)values(:deptid,:deptname,:depthead,:deptemail,:image)";
$query=$dbh->prepare($sql);
$query->bindParam(':deptid',$deptid,PDO::PARAM_STR);
$query->bindParam(':deptname',$deptname,PDO::PARAM_STR);
$query->bindParam(':depthead',$depthead,PDO::PARAM_STR);
$query->bindParam(':deptemail',$deptemail,PDO::PARAM_STR);
$query->bindParam(':image',$image,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Department has been added.")</script>';
echo "<script>window.location.href ='add-department.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}}

else
{

echo "<script>alert('Department Name or Department Id  already exist. Please try again');</script>";
}
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Skill Hub|| Add Department</title>
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
 
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Add Department</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Department</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName1">Department ID</label>
                        <input type="text" name="deptid" value="" class="form-control" required='true'>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Department Name</label>
                        <input type="text" name="deptname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Head of Department </label>
                        <input type="text" name="depthead" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1"> Photo of Head</label>
                        <input type="file" name="image" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Department Email</label>
                        <input type="email" name="deptemail" value="" class="form-control" required='true'>
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