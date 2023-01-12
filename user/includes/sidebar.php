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
         $uid= $_SESSION['sturecmsuid'];
$sql="SELECT * from tblstudent where ID=:uid";

$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                  <p class="profile-name"><?php  echo htmlentities($row->StudentName);?></p>
                  <p class="designation"><?php  echo htmlentities($row->StudentEmail);?></p><?php $cnt=$cnt+1;}} ?>
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
              <a class="nav-link" href="assignment.php">
                <span class="menu-title">Assignment</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Internships</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-internship-details.php">Add Internship Details</a></li>
                  <!--<li class="nav-item"> <a class="nav-link" href="manage-competition-details.php">Manage Competition Details</a></li>-->
                </ul>
              </div>
            </li>
			<!--<li class="nav-item">
              <a class="nav-link" href="internship-details.php">
                <span class="menu-title">Internship Details</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Competitions</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-competition-details.php">Add Competition Details</a></li>
                  <!--<li class="nav-item"> <a class="nav-link" href="manage-competition-details.php">Manage Competition Details</a></li>-->
                </ul>
              </div>
            </li>
			
			<!--<li class="nav-item">
              <a class="nav-link" href="competition.php">
                <span class="menu-title">Competition Details</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="view-notice.php">
                <span class="menu-title">View Notice</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>