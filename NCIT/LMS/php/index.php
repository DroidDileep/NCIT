<?php
#index page for login: both teacher and HOD/Admin
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home-NCIT LMS</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
  	
  </script>
  <script src="https://kit.fontawesome.com/164b99a598.js" crossorigin="anonymous"></script>
  <style type="text/css">
  	.center {
  		width: 50%;
  		margin: auto;
  		margin-top: 100px;
  	}
  	#loginbox{
  		width: 50%;
  		margin: auto;
  		margin-top: 50px;

  	}
  </style>
</head>
<body>
	
	<!-- header with logo and app name-->
		<div class="navbar">
			<nav class="navbar navbar-dark bg-primary fixed-top">
  				<a class="navbar-brand" href="#">
    			<img src="../images/ncitlogo.png" width="40" height="40" class="d-inline-block align-top" alt="">
   				Log Management System
  				</a>
			</nav>
		</div>
		
		<!-- buttons that can toggle login page for teacher and HOD -->
			<div class="center text-center">
				<h1 class="text-center text-dark"><span class="fas fa-user-tie"></span></h1>
					
					<div class="btn-group mt-3">
						<button class="btn-light btn-outline-primary btn-lg mr-5" id="tbtn">Teacher</button>
						<button class="btn-light btn-outline-primary btn-lg ml-5" id="hbtn">H O D</button>
					</div>
					
			
			</div>

		<!-- div to display the corresponding loginpage for admin and teacher-->	
		<div id="loginbox">

		</div>

		<!-- jquery code to facilitate button toggling-->
		<script type="text/javascript">
			$(document).ready(function() {
				$("#tbtn").click(function() {
					/* Act on the event */
					$("#loginbox").load("tindex.php");
				});
				$("#hbtn").click(function() {
					/* Act on the event */
					$("#loginbox").load("hindex.php");
				});
			});
		</script>

</body>
</html>