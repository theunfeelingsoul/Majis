<?php 

include "database.php";
$sql = " DELETE FROM sentsms WHERE id = $id";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

$_SERVER['HTTP_REFERER'];



 ?>