<?php
session_start();
function  get_recomendation(){
	//$hello = 30;
	//$niki =1;
	
	$user = $_SESSION["id"];
	$ex =exec("python C:/xampp/htdocs/project/Question/similar_user.py $user");
	//return $ex;
	return $ex;
}
	
$x = get_recomendation();

echo json_encode($x);

    
?>