<?php 

//select * from table
function getAll($table=""){
	global $conn;
	$sql = "SELECT * FROM $table";

	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

	while ($row = mysqli_fetch_assoc($result)) {  
		$data[] = $row;
	}


	return $data;
}

//select * from table where
function getWhere($table,$where,$value){
	global $conn;
	$sql = "SELECT * FROM $table WHERE $where = '$value'";

	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$data =FALSE;
	while ($row = mysqli_fetch_assoc($result)) {  
		$data[] = $row;
	}


	return $data;
}

//count * from table where
function countWhere($table,$where,$value){
	global $conn;
	$sql = "SELECT count(*) AS countable FROM $table WHERE $where = '$value'";

	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);
	return $row['countable'];
}

//count * from table
function countAll($table){
	global $conn;
	$sql = "SELECT count(*) AS countable FROM $table";

	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$data =FALSE;
	$row = mysqli_fetch_assoc($result);
	return $row['countable'];
}

// select single column value
function getSingle($table,$column,$where,$value){
	global $conn;
	$sql = "SELECT $column FROM $table WHERE $where = '$value' LIMIT 0,1";

	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$v =FALSE;
	while ($row = mysqli_fetch_assoc($result)) {  
		$v = $row[$column];
	}


	return $v;
}



 ?>