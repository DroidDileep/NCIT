
<?php //edit teachers logs by hod ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/164b99a598.js" crossorigin="anonymous"></script>
	<style type="text/css">
		caption{
			caption-side: top;
		}
	</style>
</head>
<body>
	<div class="search">
		<h3>Search Logs</h3>
<!-- form to search individual teachers log by using teachers first name -->
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
					<input type="submit" class="form-control form-control-sm btn-primary" name="submit" value="Search Logs">
				</div>

			</div>

			
		</form>
	</div>
	

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
session_start();
if(isset($_SESSION['loggedin']) && isset($_SESSION['userhod']) && isset($_SESSION['idhod'])){

	$name=$_POST['tname'];
	require_once("connect.php");

	#get logs that are not approved and approved based on teachers name
	$query="SELECT * FROM logsheet where tname='$name'";

	
	
#display the search result in tabular form. 
	$result=mysqli_query($conn,$query);
	if($result){
?>		
		<div id="logbox" class="m-4" style="line-height: 1">
					<table class="table table-dark table-bordered table-striped w-auto">
						<caption class="text-danger ">Logs:<?php echo $name ?></caption>
						<tr>
							<th>Date</th>
							<th>Name</th>
							<th>ID</th>
							<th>Subjects</th>
							<th>Topics</th>
							<th>Class Type</th>
							<th>Time</th>
							<th>NOP</th>
							<th>NOS</th>
							<th>Remarks</th>
							<th>Payable</th>
							<th>Status</th>
							<th>Actions</th>

						</tr>
<?php				
				while($row=mysqli_fetch_assoc($result)){
?>
					<tr>
<!-- displaying each row of result as a form so that it can be edited and submitted to update the specific log-->
<!-- each form is assigned the id of specific row of the obtained result-->						
						<form method="post" id="<?php echo $row['id'] ?>" onsubmit="update(this.id,event)" >
						<input type="number" name="rowid" value="<?php echo $row['id'] ?>" style="visibility: hidden" readonly>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['tname']; ?></td>
						<td><?php echo $row['teacher_id']; ?></td>
						<td><input type="text" class="form-control" name="sub" value="<?php echo $row['subject']; ?>"></td>
						<td><input class="form-control" type="text" name="topics" value="<?php echo $row['topics']; ?>"></td>
						<td><input class="form-control" type="text" style="width:3em " name="ctype" value="<?php echo $row['class_type']; ?>"></td>
						<td><input class="form-control" type="text" name="time" value="<?php echo $row['time']; ?>"></td>
						<td><input class="form-control" type="number" style="width:3em " name="nop" value="<?php echo $row['nop']; ?>"></td>
						<td><input class="form-control" type="number" name="nos" style="width:5em " value="<?php echo $row['nos']; ?>"></td>
						<td><input class="form-control" name="remarks" value="<?php echo $row['remarks']; ?>"></td>
						<td><div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="pay" id="r1" value="true" <?php if($row['payable']=='true') echo "checked" ?>>
										  <label class="form-check-label" for="r1">Yes</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="pay" id="r2" value="false" <?php if($row['payable']=='false') echo "checked" ?>>
										  <label class="form-check-label" for="r2">No</label>
										</div>
										</td>
						<td><?php echo $row['status']; ?></td>
						<td ><input class="form-control btn-primary" type="submit" name="subform" value="Update Log"></td>
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
			echo "no data to show";
		}
}
}
?>
<!-- jquery-ajax to submit updated form data to specific page to process the updated data --> 
	<script type="text/javascript">
		/*jquery ajax to sent form data for update*/
		function update(formid, event){
   
		    var formid="#"+formid;
		    
		    var serializedData = $(formid).serialize();


		    $.ajax({
							url:'updatetlog_byHOD.php',
							type:'POST',
							data:serializedData,
							//dataType:'text',
							success: function () {
		              			alert('log updated!');
		           			 }
						});
		    event.preventDefault();
		    /*reload pg*/

		}
	</script>

</body>
</html>