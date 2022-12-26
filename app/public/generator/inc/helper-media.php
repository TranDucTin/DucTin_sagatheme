<?php
/**
 * 
 */
require_once($_SERVER["DOCUMENT_ROOT"].'/wp-config.php');

define("PATH_THEME", $_SERVER["DOCUMENT_ROOT"]."/wp-content/themes/".WP_THEME_ACTIVE.'/');
define("JSON_FIELD", $_SERVER["DOCUMENT_ROOT"]."/wp-content/themes/".WP_THEME_ACTIVE.'/resources/acf-json');
define("LAYOUT_FILE", $_SERVER["DOCUMENT_ROOT"]."/wp-content/themes/".WP_THEME_ACTIVE.'/resources/views/template-parts/page');
define("HTML_MODULE", $_SERVER["DOCUMENT_ROOT"]."/generator/inc/module.html");
define("PAGE_CONTROLER", $_SERVER["DOCUMENT_ROOT"]."/wp-content/themes/".WP_THEME_ACTIVE.'/app/Controllers/Modules.php');
class HelperMedia
{
	public static function getMedia($url){
		// create curl resource
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url."/generator/inc/getmedia.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $medias = curl_exec($ch);
        curl_close($ch);  
		return json_decode($medias);
	}
}