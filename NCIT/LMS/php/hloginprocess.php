<?php
#processing teacher login

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		session_start();

		$userid=$_POST['userid'];
		$userpass=md5($_POST['userpass']);

		require_once("connect.php");
		$query="SELECT * FROM users WHERE username='$userid' and password='$userpass'";
		$result=mysqli_query($conn,$query);
		if($result){
			$num_rows=mysqli_num_rows($result);
			if($num_rows==0){
				header('location: index.php');
			}
			else if($num_rows==1){
				$row=mysqli_fetch_assoc($result);
				$username=$row['username'];
				$id=$row['id'];

				$_SESSION['user']=$username;
				$_SESSION['id']=$id;
				$_SESSION["loggedin"] = true;
				header('location: hhome.php');
			}
			else{
				header('location: index.php');
			}
		}
		else{
			header('location: index.php');
		}

	}
	else{
		header('location: index.php');
	}	

?>