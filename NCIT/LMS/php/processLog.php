<?php
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		#collecting form data

		$date=$_POST['date'];
		$tid=$_POST['tid'];
		$sub=$_POST['subject'];
		$topics=$_POST['topics'];
		$ctype=$_POST['ctype'];
		$time=$_POST['time'];
		$nop=$_POST['nop'];
		$nos=$_POST['nos'];
		$remarks=$_POST['remarks'];

		#connection to localhost and db selection
		$conn=mysqli_connect("localhost","root","") or die("connection error");

		$db=mysqli_select_db($conn,"lms") or die("db error");

		$query="INSERT INTO logsheet(id,date,teacher_id,subject,topics,class_type,time,nop,nos,remarks) VALUES('','$date','$tid','$sub','$topics','$ctype','$time','$nop','$nos','$remarks')";

		if(mysqli_query($conn,$query)){
			echo "log sheet updated!";
		}
		else{
			echo "error in updating log sheet!".mysqli_error($conn);
		}

	}
	else{
		echo "something wrong happened!";
	}



 ?>