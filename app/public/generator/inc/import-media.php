<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('WP_USE_THEMES', false);
/** Loads the WordPress Environment and Template */
require ('../../wp-blog-header.php');
status_header(200);
$file = isset($_POST['mediaUrl']) ? $_POST['mediaUrl'] : '';
if(!empty($file)){

	$filename = basename($file);
	$media_guid_short = preg_match('/\/([0-9]+)\/([0-9]+)\/([a-z0-9\-_\.]+)$/i', $file, $matches);
	
	global $wpdb;
	$upload_dir = wp_upload_dir();
	if($media_guid_short) {
		$media_srv_path = $upload_dir['basedir'] . $matches[0];
		if(!file_exists($media_srv_path)) {
			$_filter = true;
			add_filter( 'upload_dir', function( $arr ) use( &$_filter,&$file){
				$media_guid_short = preg_match('/\/([0-9]+)\/([0-9]+)\/([a-z0-9\-_\.]+)$/i', $file, $matches);
					if ( $_filter ) {
							$folder = '/'.$matches[1].'/'.$matches[2]; // No trailing slash at the end.
							$arr['path'] = $arr['basedir'].$folder;
							$arr['url'] = $arr['baseurl'].$folder;
							$arr['subdir'] = $folder;
					}
				
					return $arr;
			} );
			
			if(@file_get_contents($file) === false){
				echo json_encode(array(
						'status' => 'warning'
					));
				die;
			}
			$upload_file = wp_upload_bits($filename, null, @file_get_contents($file));
			$file_type = wp_check_filetype(basename($media_srv_path), null);
			$wp_filetype = wp_check_filetype($filename, null );
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => preg_replace('/\.[^.]+$/', '', basename($media_srv_path)),
				'post_content' => '',
				'post_status' => 'inherit'
			);
			$attachment_id = wp_insert_attachment($attachment, $upload_file['file'], 0);
			if (!is_wp_error($attachment_id)) {
				require_once(ABSPATH . "wp-admin" . '/includes/image.php');
				$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
				wp_update_attachment_metadata( $attachment_id,  $attachment_data );
				// echo "media file added: " . $matches[3] . '<br>';
				echo json_encode(array(
					'status' => 'success'
				));
			}else{
				echo json_encode(array(
					'status' => 'warning'
				));
			}
		} else {
					// echo "media file exists already: " . $matches[3] . '<br>';
					echo json_encode(array(
						'status' => 'exists'
					));
		}
	}
	die;
}
?>


