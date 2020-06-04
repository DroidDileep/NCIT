<?php
#sort logs
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/164b99a598.js" crossorigin="anonymous"></script>
	<style type="text/css">
		caption{
			caption-side: top;
		}
	</style>
</head>
<body>
<div class="mt-4 ml-3">
	<h3 class="ml-2">Search Logs</h3>
	<form class="form-inline mt-1" method="post" action="#">
		<div class="col-sm-2">
					<div class="input-group">
  					<div class="input-group-prepend">
    					<div class="input-group-text"><span class="fas fa-search"></span></div>
  					</div>
  					<input type="text" class="form-control form-control-sm" placeholder="Teacher Name" name="tname">
  					</div>
  				</div>
			
		<div class="form-group ml-3 mr-3">
			<label for="fromdate">From:</label>
			<input type="date" class="form-control ml-1" id="fromdate" name="fromdate">
		</div>
		<div class="form-group ml-3 mr-3">
			<label for="todate">To:</label>
			<input type="date" class="form-control ml-1" id="todate" name="todate">
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn-primary btn-sm" value="Search">
		</div>
	</form>
</div>
</body>
</html>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
require_once("connect.php");

$from=$_POST['fromdate'];
$to=$_POST['todate'];
$name=$_POST['tname'];


$query="SELECT * FROM logsheet WHERE tname='$name' and date between '$from' AND '$to' ORDER BY date DESC";

#for current month
#$query="SELECT * FROM logsheet WHERE date between  DATE_FORMAT(CURDATE() ,'%Y-%m-01') AND CURDATE()";

#last 7 days
#$query="SELECT * FROM logsheet WHERE date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) ORDER BY date DESC";

#current week ,sunday to sunday
#$query="SELECT * FROM logsheet WHERE yearweek(DATE(date)) = yearweek(curdate()) ORDER BY date DESC";

$result=mysqli_query($conn,$query);
		if($result){
	
?>		
		<div id="displaybox" class="m-4" style="line-height: 1">
					<table class="table table-dark table-bordered table-striped w-auto">
						<caption class="text-success">Search Result</caption>
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
							

						</tr>
<?php				
				while($row=mysqli_fetch_assoc($result)){
?>
					<tr>
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
						
					</tr>	
<?php 									
				}
?>
					</table>

				</div> 
<?php
		}
		else{
			echo "no data to show";
		}	
}
else{
	
}		
?>		