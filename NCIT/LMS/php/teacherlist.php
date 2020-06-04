<?php
#teacher list
	session_start();
if(isset($_SESSION['loggedin']) && isset($_SESSION['userhod']) && isset($_SESSION['idhod'])){

	require_once('connect.php');
	$query="SELECT id,fname,lname FROM teachers";
	$result=mysqli_query($conn,$query);
	if($result){
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		th,td{
			width: 20%;
			line-height: 40px;
		}
	</style>
</head>
<body>
	<div class="col-8" id="listbox">
		<h3 class="text-primary">Teachers</h3>
		<table class="table-striped table-success table-bordered table-responsive-lg">
			<tr>
					<th style="width:5%">S.N</th>
					<th>Name</th>
					<th>Id</th>
				</tr>
<?php
		$i=1;
		while($row=mysqli_fetch_assoc($result)){
?>	
				
				<tr>
					<td style="width:5%"><?php echo $i; ?></td>
					<td><?php echo $row['fname']; ?></td>
					<td><?php echo $row['id']; ?></td>
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
	