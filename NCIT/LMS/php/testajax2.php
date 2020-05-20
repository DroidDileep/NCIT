<?php
require_once("connect.php");
$tdata=$_POST['tdata'];

$query="INSERT INTO testtable1(id,tid) VALUES('','$tdata')";
if(mysqli_query($conn,$query)){
	echo "succees";
}
else{
	echo mysqli_error($conn);
}

?>