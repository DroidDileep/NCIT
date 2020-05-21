<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$rowid=$_POST['rowid'];

		require_once("connect.php");

		$query="UPDATE logsheet SET status='approved' WHERE id=$rowid";

		if(mysqli_query($conn,$query)){
			header('location:viewLog.php');
		}
		else{
			echo "something went wrong with approval";
		}

	}
	else{
		echo "You shouldn't be here!";
	}	

?>