<?php
/**
 *
 */
require_once($_SERVER["DOCUMENT_ROOT"].'/wp-config.php');
define("PATH_THEME", $_SERVER["DOCUMENT_ROOT"]."/wp-content/themes/".WP_THEME_ACTIVE.'/');
define("JSON_FIELD", $_SERVER["DOCUMENT_ROOT"]."/wp-content/themes/".WP_THEME_ACTIVE.'/resources/acf-json');
define("LAYOUT_FILE", $_SERVER["DOCUMENT_ROOT"]."/wp-content/themes/".WP_THEME_ACTIVE.'/resources/views/template-parts/page');
define("HTML_MODULE", $_SERVER["DOCUMENT_ROOT"]."/generator/inc/module.html");
define("PAGE_CONTROLER", $_SERVER["DOCUMENT_ROOT"]."/wp-content/themes/".WP_THEME_ACTIVE.'/app/Controllers/Modules/');
class Helper
{
	public static function AddModuleToJson($name,$title){
		$files = array_slice(scandir(JSON_FIELD), 2);
		foreach ($files as $key => $file) {
			$content = file_get_contents(JSON_FIELD.'/'.$file);
			$content = json_decode($content,true);
			if($content["title"] == "Modules"){
				foreach ($content["fields"][0]["layouts"] as $key => $layout) {
					if($layout["name"] == $name)
						return array("s"=>0,"m" => "Exist module name in group fields: ".$name);
				}
				$key_module = "layout_".uniqid();
				$new_module = array(
					    "key"=> $key_module,
					    "name"=> $name,
					    "label"=> $title,
					    "display"=> "block",
					    "sub_fields"=> array(),
					    "min"=> "",
					    "max"=> ""
				);
				$content["fields"][0]["layouts"][$key_module] = $new_module;
				$content["modified"] = time();
				$json_string = json_encode($content, JSON_PRETTY_PRINT);
				file_put_contents(JSON_FIELD.'/'.$file,$json_string);
				return  array("s"=>1,"m" => "Finish add to json fields: Module ".$name);
			}
		}
		return array("s"=>0,"m" => "Not found file json Module");
		// var_dump($files);die;
	}
	// public static function AddModuleToJson($name,$title){

	// }
	public static function generateFileLayout($name,$title){
		$file_layout = LAYOUT_FILE."/module-".$name.".blade.php";
		if(!file_exists($file_layout)){
			file_put_contents($file_layout, '<div class="container"><h3>Module: '.$title.'</h3></div>');
			return array("s"=>1,"m" => "Finish generate file layout: "."module-".$name.".blade.php");
		}
		return array("s"=>0,"m" => "Exist file layout: "."module-".$name.".blade.php");
	}
	public static function addCodeToPage($name,$title){
		$name_function =  str_replace(" ", "", ucwords(str_replace("_", " ", $name)));
		$content_module = file_get_contents(HTML_MODULE);
		$content_module = str_replace(array('[class_name]'), array($name_function), $content_module);

		$module_path = PAGE_CONTROLER . $name_function . ".php";

		if (!file_exists($module_path)) {
			file_put_contents($module_path, $content_module);
			return array("s"=>1,"m" => "Finish add code to folder Modules controler");
		}
		return array("s"=>0,"m" => "Exist function ".$name_function." in folder Modules controler");

		// $content_module = str_replace(array('[name_function]','[name]'), array($name_function,$name), $content_module);

		// $content_page = file_get_contents(PAGE_CONTROLER);
		// $checkNameFT = strpos($content_page, "public function Module".$name_function."(");
		// if(!$checkNameFT){
		// 	$content_page = str_replace("// Generate Module", $content_module, $content_page);
		// 	file_put_contents(PAGE_CONTROLER, $content_page);
		// 	return array("s"=>1,"m" => "Finish add code to file Modules controler");
		// }
		// return array("s"=>0,"m" => "Exist function ".$name_function." in file Modules controler");
	}
	public static function createModule($name,$title){
		// $is_add = Helper::AddModuleToJson($name,$title);
		$add_field = Helper::AddModuleToJson($name,$title);
		$add_file = Helper::generateFileLayout($name,$title);
		$add_code = Helper::addCodeToPage($name,$title);
		$message_t = array();
		$message_f = array();
		if($add_field["s"] == 1)
			$message_t[] = $add_field["m"];
		else
			$message_f[] = $add_field["m"];

		if($add_file["s"] == 1)
			$message_t[] = $add_file["m"];
		else
			$message_f[] = $add_file["m"];

		// if($add_code["s"] == 1)
		// 	$message_t[] = $add_code["m"];
		// else
			$message_f[] = $add_code["m"];
		return array("t" => implode("<br>", $message_t),"f" => implode("<br>", $message_f));
		// var_dump(uniqid());
	}

	public static function allModules(){
		$files = array_slice(scandir(JSON_FIELD), 2);
		foreach ($files as $key => $file) {
			$content = file_get_contents(JSON_FIELD.'/'.$file);
			$content = json_decode($content,true);
			if($content["title"] == "Modules"){
				return $content["fields"][0]["layouts"];
			}
		}
		return array();
	}

	public static function orderModule($modules){
		$files = array_slice(scandir(JSON_FIELD), 2);
		foreach ($files as $key => $file) {
			$content = file_get_contents(JSON_FIELD.'/'.$file);
			$content = json_decode($content,true);
			if($content["title"] == "Modules"){
				$layout_order = array();
				foreach ($modules as $key => $value) {
					foreach ($content["fields"][0]["layouts"] as $key1 => $layout) {
						if($layout['name'] == $value){
							$layout_order[$key1] = $layout;
						}
					}
				}
				$content["fields"][0]["layouts"] = $layout_order;
				$content["modified"] = time();
				$json_string = json_encode($content, JSON_PRETTY_PRINT);
				file_put_contents(JSON_FIELD.'/'.$file,$json_string);
				return  array("s"=>1,"m" => "Finish Orders");
			}
		}
		return array("s"=>0,"m" => "Error order Modules");
	}

}