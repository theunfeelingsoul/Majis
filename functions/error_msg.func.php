<?php 


function sucess($msg=""){
	$data="";
	$data.='<div class="alert alert-success" role="alert"> '.$msg.' </div>';
	echo $data;
}


function fail($msg){
	$data="";
	$data.='<div class="alert alert-danger" role="alert">'.$msg.'</div>';
	echo $data;
}




 ?>