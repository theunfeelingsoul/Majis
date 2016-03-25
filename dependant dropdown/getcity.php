<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "majis";
// made connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

// check connection
if (!$conn) {
	die(mysql_connection_error());
}

if (isset($_GET['n'])) {
	// echo "gotten";
	$name = $_GET['n'];
	// $name = $_POST['n'];

	// create sql statement
	$sql = "SELECT * FROM city where name ='$name'";
	// queried the database
	$result = mysqli_query($conn,$sql) or die ("DDDDDDD".mysqli_error());

	while ($row = mysqli_fetch_assoc($result)) {

		// $data= array('city'=> $row['cityname'], );
		$data[]= $row['cityname'];
	}

	// echo $dddd;
		$data = json_encode($data);
	 echo  $data;


} 
if (isset($_GET['c'])){
	// echo "gotten";
	$city = $_GET['c'];
	// $name = $_POST['n'];

	// create sql statement
	$sql = "SELECT * FROM food where city ='$city'";
	// queried the database
	$result = mysqli_query($conn,$sql) or die ("DDDDDDD".mysqli_error());

	while ($row = mysqli_fetch_assoc($result)) {

		// $data= array('city'=> $row['cityname'], );
		$data[]= $row['foodname'];
	}

	// echo $dddd;
		$data = json_encode($data);
	 echo  $data;
}



 ?>