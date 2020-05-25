<!DOCTYPE html>
<html>
<head>
	<title>Logs Home</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
	<style type="text/css">
		#main,#viewlogsbox,#show_logs{
			width:90%;
			margin: auto;
			margin-top: 10px;
		}
	</style>
</head>
<body>

	<div class="container-fluid">
		<div class="justify-content-center" id="main">
			<h3 class="text-success">Provide the class details</h3>
			<form class="form-inline" action="processLog.php" method="POST">
				<div class="form-group mr-2 col-xs-2">
					<input type="text" class="form-control form-control-sm" size="9" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
				</div>
				<div class="form-group mr-2 col-xs-2">
					<input type="text" class="form-control form-control-sm" size="9" name="tname" value="<?php echo 'xxx'; ?>" readonly>
				</div>
				<div class="form-group mr-2 col-xs-2">
					<input type="number" class="form-control form-control-sm" style="width: 7em" name="tid" placeholder="Teacher Id">
				</div>
				<div class="form-group mr-2 col-xs-2">
					<input type="text" class="form-control form-control-sm" name="subject" placeholder="Subject" required="">
				</div>
				<div class="form-group mr-2 col-xs-2">
					<input type="text" class="form-control form-control-sm" name="topics" placeholder="Topics" required>
				</div>
				<div class="form-group mr-2 col-xs-2">
					<div class="form-check-inline">
  						<label class="form-check-label">
    						<input type="radio" class="form-check-input" name="ctype" value="L" checked="checked">Lect
  						</label>
					</div>
					<div class="form-check-inline">
  						<label class="form-check-label">
    						<input type="radio" class="form-check-input" name="ctype" value="P">Pract
  						</label>
					</div>
				</div>

				<div class="form-group mr-2 col-xs-2">
					<input type="text" class="form-control form-control-sm" name="time" placeholder="Time" style="width: 9em"required>
				</div>
				<div class="form-group mr-2 col-xs-2">
					<input type="number" class="form-control form-control-sm" style="width: 7em" name="nop" placeholder="No.of Periods" required>
				</div>
				<div class="form-group mr-2 col-xs-2">
					<input type="number" class="form-control form-control-sm" style="width: 7em" name="nos" placeholder="No.of Students">
				</div>
				<div class="form-group mr-2 col-xs-2">
					<input type="text" class="form-control form-control-sm" name="remarks" placeholder="Remarks Any">
				</div>
				<div class="form-group mr-2 col-xs-2 mt-2">
					<input type="submit" class="form-control form-control-sm btn-primary" name="filllog" value="Submit">
				</div>

			</form>
		</div>
		<!--button to toggle teacher logs -->

		<div class="justify-content-center" id="viewlogsbox">
				<div class="form-group mr-2 col-xs-2 mt-2">
					<button class="btn-sm btn-primary" id="viewlogs">View My Logs</button>
				</div>
		
		</div>

		<!--load here the indivial teacher log-->
		<div id="show_logs" class="justify-content-center" style="display: none">
		</div>

	</div>

	<!-- script to load teacher log in new div -->

	<script type="text/javascript" >
		$(document).ready(function(){
			setInterval(function(){
				$('#show_logs').load('viewtlogs.php');
			
			},1000);

			//toggle visibility of logs view

			$("#viewlogs").click(function(){

				$("#show_logs").toggle("slow");
				
			});
		});


	</script>
</body>
</html>