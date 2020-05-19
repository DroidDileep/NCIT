<?php #admin page to view logsheeet ?>



<!DOCTYPE html>
<html>
<head>
	<title>View Log Sheet</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<script src="https://kit.fontawesome.com/164b99a598.js" crossorigin="anonymous"></script>
	<style type="text/css">
		.search{
			margin-top: 30px;
			margin-left: 50px;
		}
	</style>
</head>
<body>
	<div class="search">
		<h3>Search Logs</h3>
		<form method="post" action="#">
			<div class="form-row">
				<div class="col-sm-2">
					<div class="input-group">
  					<div class="input-group-prepend">
    					<div class="input-group-text"><span class="fas fa-search"></span></div>
  					</div>
  					<input type="text" class="form-control form-control-sm" placeholder="Teacher Name" name="tname">
  					</div>
  				</div>
			
				<div class="input-group mr-2 col-sm-1">
					<input type="submit" class="form-control form-control-sm btn-primary" name="submit" value="List Logs">
				</div>
				<div class="input-group ml-3 col-sm-1">
					<span class="text-dark">OR</span>
				</div>
				<div class="input-group mr-2 col-sm-1">
					<input type="submit" class="form-control form-control-sm btn-primary" name="submit" value="All Logs">
				</div>

			</div>

			
		</form>
	</div>
</body>
</html>
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$flag=$_POST['submit'];
		$conn=mysqli_connect("localhost","root","") or die("error localhost");
		$db=mysqli_select_db($conn,"lms");

		if($flag=="List Logs"){
			#grab a specific teacher's log
			$query="SELECT teacher_id, sum(nop) as totalperiods FROM logsheet GROUP BY teacher_id";
			$result=mysqli_query($conn,$query);
			if($result){

?>
				<div id="displaybox" class="m-4">
					<table class="table table-dark table-striped col-md-3">
						<tr>
							<th>Teacher Id</th>
							<th>Total Periods</th>
						</tr>
<?php				
				while($row=mysqli_fetch_assoc($result)){
?>
					<tr>
						<td><?php echo $row['teacher_id']; ?></td>
						<td><?php echo $row['totalperiods']; ?></td>
					</tr>	
<?php 									
				}
?>
					</table>

				</div> 
<?php
		}
		else{
			echo "no data to show!";
		}
	}
		else{
			#grab all logs
		}

	}
	else{
		echo "Nothing to Show here:-)";
	}


?>

