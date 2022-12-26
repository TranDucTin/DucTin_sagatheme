<?php

/**
 * Define constant
 */

define('TEMPLATE_URL', get_template_directory_uri());
define('RESOURCES_PATH', get_stylesheet_directory());
define('NAME_THEME_URL', str_replace('/resources', '', get_template_directory_uri()));
if (defined('IS_WP_PROD') && IS_WP_PROD) {
    define('TEMPLATE_ASSETS_URL', get_template_directory_uri() . '/assets/dist');
} else {
    define('TEMPLATE_ASSETS_URL', get_template_directory_uri() . '/assets');
}
define('IMG_BASE64', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC');
define('S3_FONT', 'https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap');
define('ACF_OPTION', 'option');
define('SCREEN', 'screen');

// define in RegisterPostType.php
define('ICON_ID', 'icon_id');
define('FEATURE_IMG_NAME', 'feature_img_name');
define('REWRITE_SLUG', 'rewrite_slug');
define('TAXONOMY_NAME', 'taxonomy_name');
define('TAXONOMY_SLUG', 'taxonomy_slug');

// define in Walker_Nav_Menu
define('THEME_LOCATION', 'theme_location');
define('CONTAINER', 'container');
define('ITEMS_WRAP', 'items_wrap');
define('DEPTH', 'depth');
define('WALKER', 'walker');
define('ECHO_TEXT', 'echo');

// define in Helpers.php
define('PREG_MATCH_YOUTUBE', "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/");
define('PREG_MATCH_VIMEO', '%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im');
