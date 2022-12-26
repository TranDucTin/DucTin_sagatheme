<?php
require_once('inc/helper.php' );
if(isset($_POST['modules']) && !empty($_POST['modules'])){
	// echo json_encode(array("status"=>true,"message"=>"Đậu xanh rau má ^^!"));
	// die;
	$modules = explode('|', $_POST['modules']);
	$return = Helper::orderModule($modules);
	echo json_encode($return);die;
}
echo "<h1>Đậu xanh rau má ^^!</h1>";
die;
?>