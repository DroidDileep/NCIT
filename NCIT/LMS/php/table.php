<?php
	
	$conn=mysqli_connect("localhost","root","") or die("connection error");

	$db=mysqli_select_db($conn,"lms") or die("db error");

	#create table

	$query="CREATE TABLE logsheet(id INT(10) PRIMARY KEY AUTO_INCREMENT,date DATE,teacher_id INT(4),subject TEXT(100) NOT NULL,topics VARCHAR(200) NOT NULL,class_type TEXT(10) NOT NULL, time VARCHAR(100) NOT NULL,nop INT(2) NOT NULL,nos INT(3) NOT NULL,remarks VARCHAR(100))";
	if(mysqli_query($conn,$query)){
		echo "table created!";
	}
	else{
		echo "error in creating table!";
	}

?>
