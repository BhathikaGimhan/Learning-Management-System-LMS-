<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    $stuid=$_POST['stuid'];
    $stuname=$_POST['stuname'];
    $stuemail=$_POST['stuemail'];
    $facultyname=$_POST['facultyname'];
    $deptname=$_POST['deptname'];
    $acadeyear=$_POST['acadeyear'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $connum=$_POST['connum'];
    $altconnum=$_POST['altconnum'];
    $address=$_POST['address'];
    $uname=$_POST['uname'];
    $password=md5($_POST['password']);
    $image=$_FILES["image"]["name"];
    $ret="select UserName from tblstudent where UserName=:uname || StuID=:stuid";
    $query= $dbh -> prepare($ret);
   $query->bindParam(':uname',$uname,PDO::PARAM_STR);
   $query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
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
$sql="insert into tblstudent(StudentName,StudentEmail,StudentClass,Gender,DOB,StuID,FatherName,MotherName,ContactNumber,AltenateNumber,Address,UserName,Password,Image)values(:stuname,:stuemail,:stuclass,:gender,:dob,:stuid,:fname,:mname,:connum,:altconnum,:address,:uname,:password,:image)";
$query=$dbh->prepare($sql);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query->bindParam(':stuname',$stuname,PDO::PARAM_STR);
$query->bindParam(':stuemail',$stuemail,PDO::PARAM_STR);
$query->bindParam(':facultyname',$facultyname,PDO::PARAM_STR);
$query->bindParam(':deptname',$deptname,PDO::PARAM_STR);
$query->bindParam(':acadeyear',$acadeyear,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':connum',$connum,PDO::PARAM_STR);
$query->bindParam(':altconnum',$altconnum,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':image',$image,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Student has been added.")</script>';
echo "<script>window.location.href ='add-students.php'</script>";
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
   
    <title>Skill Hub|| Add Workshop Details</title>
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
             <h3 class="page-title"> Search Student </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                 <li class="breadcrumb-item active" aria-current="page"> Search Student</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form method="post">
                                <div class="form-group">
                                   <strong>Search Student:</strong>
                                   
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Search by Student ID"></div>
                               
                                <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                            </form>
                    <div class="d-sm-flex align-items-center mb-4">


                       <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      
                      <table class="table">
                        <thead>
                          <tr>
                    
                            <th class="font-weight-bold">Student ID</th>
                            
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Student Email</th>
                            <th class="font-weight-bold">Faculty</th>
                            <th class="font-weight-bold">Department</th>
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
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $ret = "SELECT ID FROM tblstudent";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql="SELECT tblstudent.StuID,tblstudent.ID as sid,tblstudent.StudentName,tblstudent.StudentEmail,tblstudent.Faculty,tblstudent.Department,tblstudent.AcademicYear,tblstudent.Gender,tblstudent.DOB,tblstudent.ContactNumber,tblstudent.AlternateNumber,tblstudent.Address,tblstudent.UserName,tblstudent.Pasword,LIMIT $offset, $no_of_records_per_page";
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
                            <td><?php  echo htmlentities($row->StuID);?></td>
                            <td><?php  echo htmlentities($row->StuName);?> 
                            <?php  echo htmlentities($row->StudentEmail);?></td>
                            <td><?php  echo htmlentities($row->Faculty);?></td>
                            <td><?php  echo htmlentities($row->Department);?></td>
                            <td><?php  echo htmlentities($row->AcademicYear);?></td>
                            <td><?php  echo htmlentities($row->Gender);?></td>
                            <td><?php  echo htmlentities($row->DOB);?></td>
                            <td><?php  echo htmlentities($row->ContactNumber);?></td>
                            <td><?php  echo htmlentities($row->AltenateNumber);?></td>
                            <td><?php  echo htmlentities($row->Address);?></td>
                            <td><?php  echo htmlentities($row->Username);?></td>
                            <td><?php  echo htmlentities($row->password);?></td>
                            <td>
                              <div><a href="edit-student-detail.php?editid=<?php echo htmlentities ($row->sid);?>"><i class="icon-eye"></i></a>
                                                || <a href="manage-students.php?delid=<?php echo ($row->sid);?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="icon-trash"></i></a></div>
                            </td> 
                          </tr><?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
                        </tbody>
                      </table>
                    </div>




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
                  <li class="breadcrumb-item active" aria-current="page"> Add Students</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Students</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                        <label for="exampleInputName1">Student ID</label>
                        <input type="text" name="stuid" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Student Name</label>
                        <input type="text" name="stuname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Student Email</label>
                        <input type="email" name="stuemail" value="" class="form-control" required='true'>
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
                  <label for="exampleInputName1">Academic Year</label>
                  <input type="year" name="acadeyear" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Gender</label>
                        <select name="gender" value="" class="form-control" required='true'>
                          <option value="">Choose Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">DOB</label>
                        <input type="date" name="dob" value="" class="form-control" required='true'>
                      </div>
                      
                      <div class="form-group">
                      <label for="exampleInputName1">Contact Number</label>
                      <input type="text" name="connum" value="" class="form-control" required='true'>
                    </div>
                <div class="form-group">
                  <label for="exampleInputName1">Alternate Contact Number</label>
                  <input type="text" name="altconnum" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                </div>
                <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <input type="textarea" name="address" class="form-control" required='true'></textarea>
                      </div>
                <h3>Login details</h3>
                        <div class="form-group">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" name="uname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="Password" name="password" value="" class="form-control" required='true'>
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