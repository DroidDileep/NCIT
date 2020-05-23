<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
  	
  </script>
</head>
<body>



<?php

	require_once("connect.php");
	$query="SELECT * FROM logsheet where teacher_id=301 and status='not approved' ";
	$result=mysqli_query($conn,$query);
	if($result){
?>		
		<div id="dbox" class="m-4" style="line-height: 1">
					<table class="table table-dark table-bordered table-striped w-auto">
						<tr>
							<th>Date</th>
							<th>Subjects</th>
							<th>Topics</th>
							<th>Class Type</th>
							<th>Time</th>
							<th>NOP</th>
							<th>NOS</th>
							<th>Remarks</th>
							<th>Status</th>
							<th>Actions</th>

						</tr>
<?php				
				while($row=mysqli_fetch_assoc($result)){
					$formid=$row['id'];
?>
					<tr >
						<form id="<?php echo $row['id'] ?>" method="post" onsubmit="update(this.id)">
						<input type="number" name="rowid" value="<?php echo $row['id'] ?>" style="visibility: hidden"
						>	
						<td><?php echo $row['date']; ?></td>
						<td><input type="text" class="form-control" name="sub" value="<?php echo $row['subject']; ?>"></td>
						<td><input class="form-control" type="text" name="topics" value="<?php echo $row['topics']; ?>"></td>
						<td><input class="form-control" type="text" style="width:3em " name="ctype" value="<?php echo $row['class_type']; ?>"></td>
						<td><input class="form-control" type="text" name="time" value="<?php echo $row['time']; ?>"></td>
						<td><input class="form-control" type="number" style="width:3em " name="nop" value="<?php echo $row['nop']; ?>"></td>
						<td><input class="form-control" type="number" name="nos" style="width:5em " value="<?php echo $row['nos']; ?>"></td>
						<td><input class="form-control" name="remarks" value="<?php echo $row['remarks']; ?>"></td>
						<td><?php echo $row['status']; ?></td>
						<td ><input class="form-control btn-primary" type="submit" name="subform" value="update Log"></td>
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

?>
<script type="text/javascript">
	/*
	$(document).ready(function(){
				alert("<?php echo $formid ?>");
				/*
				$.ajax({
					url:'testupdatelog.php',
					type:'POST',
					data:{'tdata':tid},
					//dataType:'text',
					success: function () {
              			alert('log updated');
           			 }
				});
		*/		
	 //process each row update of above tables using the form id			
	//$(".<?php echo $formid ?>").submit(function(event){

		function update(formid){
    // Prevent default posting of form - put here to work in case of errors
    //event.preventDefault();
    
    // Abort any pending request
    
    //if (request) {
      //  request.abort();
    //}
    var formid="#"+formid;
    alert(formid);
    // setup some local variables
    //var $form = $(this);
    var serializedData = $(formid).serialize();

   // $.post('testajax2.php', serializedData, function(response) {
    // Log the response to the console
    //console.log("Response: "+response);


    $.ajax({
					url:'testupdatelog.php',
					type:'POST',
					data:serializedData,
					//dataType:'text',
					success: function () {
              			alert('log updated');
           			 }
				});

}
	/*
    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "testajax2.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
       // console.log("Hooray, it worked!");
       alert("Log Updated Successfully!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        /*
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
      
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});

			
		});	
*/
</script>

</body>
</html>