<?php
#teacher home page
#accessing page based on already created session variables
	session_start();
	if(isset($_SESSION['loggedin']) && isset($_SESSION['usert']) && isset($_SESSION['idt'])){
		$user=$_SESSION['usert'];
		$id=$_SESSION['idt'];

?>		
		<!DOCTYPE html>
		<html>
		<head>
			<title>Teacher-Home</title>
			<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
			<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

			<style type="text/css">
				#maindiv{
					margin-top: 80px;
					margin-left:20px; 
				}
				button{
					margin-bottom: 10px;
				}
				#leftcol{
					border-right: 2px solid blue;
					height:500px;
				}
				h4 a{
					color: red;
					padding-left: 6px;
					font-size: 14px;
				}
					 	
			</style>

		</head>
		<body>
			<!-- header section-->
					<nav class="navbar navbar-dark bg-primary fixed-top">
		  				<a class="navbar-brand" href="#">
		    			<img src="../images/ncitlogo.png" width="40" height="40" class="d-inline-block align-top" alt="">
		   				Log Management System
		  				</a>
		  				<div class="navbar-nav ml-auto">
		            		<h4 class="text-dark">Welcome <?php echo $user?><a href="logout.php">log out</a></h4>
		        		</div>
		  				
					</nav>
				<!-- two columns one for displaying options as buttons and another one for displaying corresponding web page-->	
					<div class="row" id="maindiv">
						<div class="col-2" id="leftcol">
							<h3 class="text-success">Actions</h3>
							<div class="btn-group btn-group-vertical">
							<button type="button" class="btn btn-outline-primary c" id="filllogs">Fill Log</button>
							<button type="button" class="btn btn-outline-primary c" id="viewlogs">View Log</button>
							<button type="button" class="btn btn-outline-primary" id="deletelogs">Delete Log</button>
							</div>
						</div>
						<div class="col-10" id="rightcol">
							<iframe id="dbox" src="" height="500px" width="1000px"></iframe>
						</div>

					</div>
			<!-- script to toggle content of iframe based on clicked button-->		
				<script type="text/javascript">
					$(document).ready(function() {
						$("#filllogs").click(function() {
							/* Act on the event, fill own logs */
							//$("#rightcol").load("viewLog.php");
							$("#dbox").attr('src', 'fillLog.php');
						});
						$("#viewlogs").click(function() {
							/* Act on the event, edit/view own logs */
							//$("#rightcol").load("addteacher.php");
							$("#dbox").attr('src', 'viewtlogs.php');
						});
						$("#deletelogs").click(function() {
							/* Act on the event, view teacher */
							//$("#rightcol").load("addteacher.php");
							$("#dbox").attr('src', 'deleteownlog.php');
						});
					});
				</script>

		</body>
		</html>
<?php		
	}
	else{
		#unauthorized access
		header('location: index.php ');
	}	

?>