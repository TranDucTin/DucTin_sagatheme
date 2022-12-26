<?php
require_once('inc/helper.php' );
if(isset($_POST['title']) && isset($_POST['name'])){
	// echo json_encode(array("status"=>true,"message"=>"Đậu xanh rau má ^^!"));
	// die;
	$return = Helper::createModule($_POST['name'],$_POST['title']);
	echo json_encode($return);die;
}
echo "<h1>Đậu xanh rau má ^^!</h1>";
die;
?>