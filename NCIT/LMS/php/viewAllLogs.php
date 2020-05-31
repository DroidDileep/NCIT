<?php #admin page to view logsheeet of all teachers or individual teachers ; view approved and archieved,not approved logs seperatly 

	session_start();
	if(isset($_SESSION['loggedin']) && isset($_SESSION['userhod']) && isset($_SESSION['idhod'])){

?>

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
		caption{
			caption-side: top;
		}
	</style>
</head>
<body>
	<div class="search">
		<h3>Search Logs</h3>
		<form method="post" action="#">
	<!-- form to search log by teacher name -->		
			<div class="form-row">
				<div class="col-sm-2">
					<div class="input-group">
  					<div class="input-group-prepend">
    					<div class="input-group-text"><span class="fas fa-search"></span></div>
  					</div>
  					<input type="text" class="form-control form-control-sm" placeholder="Teacher Name" name="tname">
  					</div>
  				</div>
			
				<div class="input-group mr-2 col-sm-2">
					<select class="custom-select custom-select-sm" name="type" required>
						<option value="all" selected>Select Log Type</option>
			 			<option value="not approved">Not Approved</option>
						<option value="approved">Approved</option>
						<option value="archieved">Archieved</option>
						<option value="all">All</option>
					</select>
				</div>
				<div class="input-group mr-2 col-sm-1">
					<input type="submit" class="form-control form-control-sm btn-primary" name="submit" value="Search">
				</div>

			</div>

			
		</form>
	</div>
</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$name=$_POST['tname'];
		$type=$_POST['type'];

		require_once("connect.php");

		if($type=='all'){
			#all categories
			$query="SELECT * FROM logsheet WHERE tname='$name'";
		}
		else{
			#other specific categories
			$query="SELECT * FROM logsheet WHERE tname='$name' and status='$type' ";
		}

		$result=mysqli_query($conn,$query);
		$numrows=mysqli_num_rows($result);
		if($numrows>=1){
?>		
				<div id="logbox" class="m-4" style="line-height: 1">
							<table class="table table-dark table-bordered table-striped w-auto">
								<caption class="text-danger ">Logs-<?php echo $type ?></caption>
								<tr>
									<th>Date</th>
									<th>Name</th>
									<th>Subjects</th>
									<th>Topics</th>
									<th>Class Type</th>
									<th>Time</th>
									<th>NOP</th>
									<th>NOS</th>
									<th>Remarks</th>
									<th>Status</th>
									<th>Payable</th>
<?php 
#display approval option only if the log is not approved
									if($type=='not approved'){
?>
									<th>Actions</th>	
<?php
									}									
?>									

								</tr>
<?php				
								while($row=mysqli_fetch_assoc($result)){
?>
									<tr>
										<form method="POST" action="approvelog.php">
										<input type="number" name="rowid" value="<?php echo $row['id'] ?>" style="visibility: hidden" readonly>	
										<td><?php echo $row['date']; ?></td>
										<td><?php echo $row['tname']; ?></td>
										<td><?php echo $row['subject']; ?></td>
										<td><?php echo $row['topics']; ?></td>
										<td><?php echo $row['class_type']; ?></td>
										<td><?php echo $row['time']; ?></td>
										<td><?php echo $row['nop']; ?></td>
										<td><?php echo $row['nos']; ?></td>
										<td><?php echo $row['remarks']; ?></td>
										<td><?php echo $row['status']; ?></td>
<?php
										if($type=='not approved'){
?>

										<td><div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="pay" id="r1" value="Ontime Pay">
										  <label class="form-check-label" for="r1">ontime pay</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="pay" id="r2" value="Offtime Pay">
										  <label class="form-check-label" for="r2">Offtime pay</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="pay" id="r3" value="Not Applicable">
										  <label class="form-check-label" for="r3">Not Applicable</label>
										</div>
										</td>
										<td ><button class="btn-primary">Approve Log</button></td>
<?php
										}
										else{
?>
										<td><?php echo $row['payable']; ?></td>
<?php																					
										}				
?>																
										
										</form>
									</tr>	
<?php 									
								}
?>
							</table>

				</div> 
<?php
			}
			else{
?>
			<div class="alert-info">No Data to Show!</div>
<?php
			}
	}		
	else{
		echo "error in post method!";
	}	


}
else{
	echo "session error";
}

?>	