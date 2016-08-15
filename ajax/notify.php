<?php 

include "../database.php";
$sql = " SELECT id FROM notification WHERE seen = 0";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$rowcount=mysqli_num_rows($result);

echo $rowcount;
        
 ?>