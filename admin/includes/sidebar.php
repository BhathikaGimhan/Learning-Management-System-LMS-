<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <?php
         $aid= $_SESSION['sturecmsaid'];
$sql="SELECT * from tbladmin where ID=:aid";

$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                  <p class="profile-name"><?php  echo htmlentities($row->AdminName);?></p>
                  <p class="designation"><?php  echo htmlentities($row->Email);?></p><?php $cnt=$cnt+1;}} ?>
                </div>
               
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Faculty</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-faculty.php">Add Faculty</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-faculty.php">Manage Faculty</a></li>
                </ul>
              </div>
            </li>
         

			 <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Department</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-department.php">Add Department</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-department.php">Manage Department</a></li>
                </ul>
              </div>
            </li>
            
			<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Batch</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-batch.php">Add batch</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-batch.php">Manage Batch</a></li>
                </ul>
              </div>
            </li>
            
            </li>
			 <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Course</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-course.php">Add Course</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-course.php">Manage Course</a></li>
                </ul>
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Subject</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-subject.php">Add Subject</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-subject.php">Manage Subject</a></li>
                </ul>
              </div>
            </li>
			 <!--<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Assignment</span>
                <i class="icon-layers menu-icon"></i>
              </a>
             <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-assignment.php">Add Assignment</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-assignment.php">Manage Assignment</a></li>
                </ul>
              </div>
            </li>-->
			
			<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Exam Details</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-exam-details.php">Add Exam Details</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-exam-details.php">Manage Exam Details</a></li>
                </ul>
              </div>
            </li>
			
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Students</span>
                <i class="icon-people menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-students.php">Add Students</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-students.php">Manage Students</a></li>
                </ul>
              </div>
            </li>
			
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Results</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-result.php">Add Results</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-result.php">Manage Results</a></li>
                </ul>
              </div>
            </li>
			 <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">GPA</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"  href="cgpa.php" href="getdata.php">Add GPA</a></li>
                 <!-- <li class="nav-item"> <a class="nav-link" href="manage-gpa.php">Manage GPA</a></li>-->
                </ul>
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Past papers</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-pastpaper.php">Add Past papers</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-pastpaper.php">Manage Past papers</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Research Topic</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-researchtopic.php">Add Research Topic</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-researchtopic.php">Manage Research Topic</a></li>
                </ul>
              </div>
            </li>

			<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Workshops Details</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-workshop-details.php">Add Workshops Details</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-workshop-details.php">Manage Workshops Details</a></li>
                </ul>
              </div>
            </li>
			
            <!--<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Notice</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-notice.php"> Add Notice </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-notice.php"> Manage Notice </a></li>
                </ul>
              </div>-->
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Public Notice</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-public-notice.php"> Add Public Notice </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-public-notice.php"> Manage Public Notice </a></li>
                </ul>
              </div>
              <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Pages</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="about-us.php"> About Us </a></li>
                  <li class="nav-item"> <a class="nav-link" href="contact-us.php"> Contact Us </a></li>
                </ul>
              </div>
            </li>
              
           <!-- <li class="nav-item">
              <a class="nav-link" href="search.php">
                <span class="menu-title">Search</span>
                <i class="icon-magnifier menu-icon"></i>
              </a>
            </li>-->
            </li>
          </ul>
        </nav>