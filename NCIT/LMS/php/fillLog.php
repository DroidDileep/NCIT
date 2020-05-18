<!DOCTYPE html>
<html>
<head>
	<title>Logs Home</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style type="text/css">
		.main{
			width:80%;
			margin: auto;
			margin-top: 100px;
		}
	</style>
</head>
<body>

	<div class="container-fluid">

		<div class="main justify-content-center">
			<h3 class="text-success">Provide the class details</h3>
			<form class="form-inline" action="processLog.php" method="POST">
				<div class="form-group mr-2 col-xs-2">
					<input type="text" class="form-control form-control-sm" size="9" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
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
					<input type="text" class="form-control form-control-sm" name="time" placeholder="Time" required>
				</div>
				<div class="form-group mr-2 col-xs-2">
					<input type="number" class="form-control form-control-sm" style="width: 7em" name="nop" placeholder="No.of Periods" required>
				</div>
				<div class="form-group mr-2 col-xs-2">
					<input type="number" class="form-control form-control-sm" style="width: 7em" name="nos" placeholder="No.of Students">
				</div>
				<div class="form-group mr-2 col-xs-2 mt-2">
					<input type="submit" class="form-control form-control-sm btn-primary" name="filllog" value="Submit">
				</div>

			</form>
		</div>
	</div>

</body>
</html>