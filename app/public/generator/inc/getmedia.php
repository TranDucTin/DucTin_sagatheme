<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('WP_USE_THEMES', false);
require ('../../wp-blog-header.php');
status_header(200);
$attachments = get_posts( array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_status' => 'inherit'

) );
$items = array();
foreach ($attachments as $key => $value) {
	$thumb = wp_get_attachment_thumb_url( $value->ID );
	$type_file = pathinfo(wp_get_attachment_thumb_url( $value->ID ), PATHINFO_EXTENSION);
	if(!in_array($type_file, array('jpg','jpeg','JPG','JPEG','png','PNG'))){
		$thumb = '/wp-includes/images/media/document.png';
		$type_file = 'doc';
	}
	$items[$key] = array(
		'title' => $value->post_title,
		'post_date' => $value->post_date,
		'month' => date('m-Y', strtotime($value->post_date)),
		'day' => date('d-m-Y', strtotime($value->post_date)),
		'post_mime_type' => $value->post_mime_type,
		'url' => wp_get_attachment_url($value->ID),
		'thumb' => $thumb,
		'type_file' => $type_file
	);
}
echo json_encode($items);
die;
?>


