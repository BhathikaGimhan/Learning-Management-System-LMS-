<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   // Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblexam where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-exam-details.php'</script>";     


}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Skill Hub|||Manage Exam Details</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   
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
                  <li class="breadcrumb-item active" aria-current="page"> Manage Exam Details</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Manage Exam Details </h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Manage Exam Details</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            
                            <th class="font-weight-bold">Exam ID</th>
                           
                            <th class="font-weight-bold">Subject Name</th>
                            <th class="font-weight-bold">Faculty</th>
                           <th class="font-weight-bold">Department</th>
                           <th class="font-weight-bold">Semester</th>
                            <th class="font-weight-bold"> Subject Code </th>
                            <th class="font-weight-bold">Exam Date</th>
                            <th class="font-weight-bold">CA Marks</th>
                           
                            <th class="font-weight-bold"> Final Exam Marks </th>
                            <th class="font-weight-bold">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                           <?php
                            if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 15;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $ret = "SELECT ID FROM tblexam";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql="SELECT tblexam.ExamID,tblexam.ID as eid,tblexam.SubjectName,tblexam.Faculty,tblexam.Department,tblexam.SubjectCode,tblexam.ExamDate,tblexam.CAMark,tblexam.FinalExamMark,tblexam.Semester  LIMIT $offset, $no_of_records_per_page";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
                          <tr>
                           
                            <td><?php echo htmlentities($cnt);?></td>
                            <td><?php  echo htmlentities($row->examID);?></td>
                            <td><?php  echo htmlentities($row->SubjectName);?> 
                            <td><?php  echo htmlentities($row->Faculty);?></td>
                            <td><?php  echo htmlentities($row->Department);?></td>
                            
                            <td><?php  echo htmlentities($row->SubjectCode);?></td>
                            <td><?php  echo htmlentities($row->ExamDate);?></td>
                            <td><?php  echo htmlentities($row->CAMark);?></td>
                            <td><?php  echo htmlentities($row->FinalExamMark);?></td>
                            <td><?php  echo htmlentities($row->Semester);?></td>
                            <td>
                              <div><a href="edit-exam-detail.php?editid=<?php echo htmlentities ($row->sid);?>"><i class="icon-eye"></i></a>
                                                || <a href="manage-exam.php?delid=<?php echo ($row->sid);?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="icon-trash"></i></a></div>
                            </td> 
                          </tr><?php $cnt=$cnt+1;}} ?>
                        </tbody>
                      </table>
                    </div>
                    <div align="left">
    <ul class="pagination" >
     
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
      
    </ul>
</div>
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
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>