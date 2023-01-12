<?php
$sgpa=0;
	if(!empty($_POST["save"])) 
	{
		
		$total_subjects = count($_POST["subject_name"]);
		$counter=0;

		
		$total_cr=$_POST['total_cr'];
		$sub_cr=$_POST["sub_cr"];
		for($i=0;$i<$total_subjects;$i++)
		{
			$counter++;
			$sub_gpa=($_POST["subject_gpa"][$i]*$sub_cr[$i])/$total_cr;	
			$sgpa+=$sub_gpa;
			
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Skill Hub|| GPA Calculator</title>
</head>
	
	<link rel="stylesheet" type="text/css" href="gcss/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="gcss/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script>

function addMore() {
	$("<div>").load("getdata.php", function() {
			$("#subjects").append($(this).html());
	});	
}
function deleteRow() {
	$('div.grab_values').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}
</script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
   <!-- <div class="navbar-header">
      <a class="navbar-brand" href="index.php">GPA CALCULATOR</a>
    </div>-->
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>Calculate SGPA</a></li>
      <li><a href="cgpa.php"><span class="glyphicon glyphicon-flag"></span>Calculate CGPA</a></li>
    </ul>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-lg-7 col-lg-offset-2">
			<form method="post">
				<b>Your SGPA : </b>
				<input type="text"  class="form-control" placeholder="Your SGPA is" value="<?php print round($sgpa, 2) ;?>" readonly></input><br>
				<input type="text" name="total_cr"  class="form-control" placeholder="Total Credit Hours" required></input>
	
				<table class="table" >
					<th>&nbsp&nbsp&nbsp&nbsp&nbsp</th>
					<th>Subject Name</th><br>
					<th>Subject Credit Hour</th>	<br>
					
					
				
				</table>
				<div id="subjects">
					<?php include("getdata.php") ?>
				</div>

				<div>
					<br><br>
					<input type="button" class="btn btn-success" name="add_item" value="Add More" onClick="addMore();" />
					<input type="button" class="btn btn-danger" name="del_item" value="Delete" onClick="deleteRow();" />
					<input type="submit" name="save" value="Calculate" class="btn btn-primary"/>
					<br><br>
				</div>
				<div>
					
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>