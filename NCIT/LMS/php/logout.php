<?php
	session_start();
	if(isset($_SESSION['loggedin'])){
			if(isset($_SESSION['usert'])){
				unset($_SESSION['usert']);
				unset($_SESSION['idt']);
				header('location:index.php');
			}
			if(isset($_SESSION['userhod'])){
				unset($_SESSION['userhod']);
				unset($_SESSION['idhod']);
				header('location:index.php');
			}	
	}
	else{
		header('location:index.php');
	}

?>