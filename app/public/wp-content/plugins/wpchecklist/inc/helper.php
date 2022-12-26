<?php

/**
 * 
 */
class Helper
{
 	function generator(){
 		$alls = array(
 			'siteName' => get_bloginfo(),
 			'baseURL' => get_home_url(),
 			'total' => 0,
 			'passed' => 0,
 			'failed' => 0,
 			'results' => array()
 		);
 		$alls['results'][] = $this->checkLatestWP();
 		$alls['results'][] = $this->checkPluginSecurity();
 		$alls['results'][] = $this->checkPluginCache();



 		$alls['total'] = count($alls['results']);
 		$status = array_count_values(array_column($alls['results'], 'status'));
 		$alls['passed'] = ($status[1] == null) ? 0 : $status[1];
 		$alls['failed'] = ($status[0] == null) ? 0 : $status[0];
 		echo json_encode($alls);die;
 	}

 	// Check to the latest version of WP
 	private function checkLatestWP(){
 		$current = get_bloginfo('version');
 		$url = 'https://api.wordpress.org/core/version-check/1.7/';
		$response = wp_remote_get($url);
		$json = $response['body'];
		$obj = json_decode($json);
		$upgrade = $obj->offers[0];
		$last =  $upgrade->version;
		if($current != $last){
			return array("status"=>0,"message"=>'Chưa phải Latest WP. Hiện tại '.$current.' - Lastest '.$last);
		}
 		return array("status"=>1,"message"=>'Là Latest WP. Hiện tại '.$current);
 	}

 	//Check Kiểm tra có active plugin All In One Security hay ko ?
 	private function checkPluginSecurity(){
 		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 		if ( is_plugin_active( 'all-in-one-wp-security-and-firewall/wp-security.php' ) ) {
		  	return array("status"=>1,"message"=>'Đã Active Plugin all-in-one-wp-security-and-firewall');
		} 
		return array("status"=>0,"message"=>'Chưa Active Plugin all-in-one-wp-security-and-firewall');
 	}

 	private function checkPluginCache(){
 		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 		if ( is_plugin_active( 'wp-super-cache/wp-cache.php' ) ) {
 			$wp_cache_config_file = WP_CONTENT_DIR . '/wp-cache-config.php';
 			if(file_exists($wp_cache_config_file)){
 				include( $wp_cache_config_file );
 				if($cache_enabled && $super_cache_enabled){
 					return array("status"=>1,"message"=>'Đã Active Plugin wp-super-cache và enable cache');
 				}else
 					return array("status"=>0,"message"=>'Đã Active Plugin wp-super-cache nhưng chưa enable cache');
 			}else{
 				return array("status"=>0,"message"=>'Đã Active Plugin wp-super-cache nhưng chưa enable cache');
 			}
		} 
		return array("status"=>0,"message"=>'Chưa Active Plugin wp-super-cache');
 	}
}

