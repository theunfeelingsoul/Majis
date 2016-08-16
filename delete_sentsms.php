<?php 


include "database.php";

if ($_GET['id']) {

	$id =$_GET['id'];
	$sql = "DELETE FROM sentsms WHERE id = $id";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

	header("Location:sentsms.php");
}

if ($_GET['userid']) {

	$userid =$_GET['userid'];
	$sql = "DELETE FROM user WHERE id = $userid";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

	header("Location:users.php?d=1");
}




 ?>