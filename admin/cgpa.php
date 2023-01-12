<?php 
$answer=0; 
if (isset($_POST['submit'])) 
{
	$current_gpa=$_POST['current_gpa'];
	$previous_semester=$_POST['previous_semester'];
	$expected=$_POST['expected'];
	$this_semester=$_POST['this_semester'];

	$sum=$current_gpa*$previous_semester;
	$sum1=$sum+$expected;
	$answer=$sum1/$this_semester;
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <!--<a class="navbar-brand" href="index.php">GPA Calculator</a>-->
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Calculate SGPA</a></li>
      <li class="active"><a href="cgpa.php"><span class="glyphicon glyphicon-flag"></span>Calculate CGPA</a></li>
    </ul>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-lg-5 col-lg-offset-3">
			<form method="post" class="form-group">
				<input type="text" name="current_gpa" placeholder="Current CGPA" class="form-control"></input><br><br>
				<input type="text" name="expected" placeholder="Expected CGPA" class="form-control"></input><br><br>
				<input type="text" name="previous_semester" placeholder="Your Previous Semester" class="form-control"></input><br><br>
				<input type="text" name="this_semester" placeholder="Your Current Semester" class="form-control"></input><br><br>
				<b>Your CGPA</b><br><br>
				<input type="text"  class="form-control" placeholder="CGPA" value="<?php print round($answer, 2) ;?>" readonly></input><br><br>
				<input type="button" class="btn btn-success" name="add_item" value="Add More" onClick="addMore();" />
					<input type="button" class="btn btn-danger" name="del_item" value="Delete" onClick="deleteRow();" />
				<input type="submit" name="submit" value="Calculate" class="btn btn-primary"></input>

			</form>
		</div>
	</div>
</div>
<center>
<div class="alert alert-info">
	<p>Your Previous Semester* (means the semester in which you appeared last time)</p>
	<p>Your current Semester* (means the semester in which you appeared recently)</p>
</div>
</center>


</body>
</html>