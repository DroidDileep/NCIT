<?php
#display teacher-subject list
session_start();
if(isset($_SESSION['loggedin']) && isset($_SESSION['userhod']) && isset($_SESSION['idhod'])){

	require_once('connect.php');
	$query="SELECT * FROM subjects";
	$result=mysqli_query($conn,$query);
	if($result){
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		th,td{
			width:30%;
			 
		}
	</style>
</head>
<body>
	<div class="" id="subbox">
		<h3 class="text-primary">Subjects Assigned</h3>
		<table class="table-striped table-success table-bordered ">
			<tr>
					<th style="width:5%">S.N</th>
					<th>Name</th>
					<th>Subject</th>
					<th>Semester</th>
					<th>Faculty</th>
				</tr>
<?php
		$i=1;
		while($row=mysqli_fetch_assoc($result)){
?>	
				
				<tr>
					<td style="width:5%"><?php echo $i ?></td>
					<td><?php echo $row['tname']; ?></td>
					<td><?php echo $row['subject']; ?></td>
					<td><?php echo $row['semester']; ?></td>
					<td><?php echo $row['faculty']; ?></td>
				</tr>
<?php 
		$i++;
		}
?>						
		</table>
	</div>
	</body>
	</html>
<?php					
	
}
	else{
		echo "error-nothing to show";
	}
}else{
	echo "auth error!";
}	
?>