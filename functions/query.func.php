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

// select single column value
function getSingle($table,$column,$where,$value){
	global $conn;
	$sql = "SELECT $column FROM $table WHERE $where = '$value' LIMIT 0,1";

	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$data =FALSE;
	while ($row = mysqli_fetch_assoc($result)) {  
		$v = $row[$column];
	}


	return $v;
}



 ?>