<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.9thwonder.com
 * @since             1.0.0
 * @package           Wpchecklist
 *
 * @wordpress-plugin
 * Plugin Name:       WP Checklist
 * Plugin URI:        https://www.9thwonder.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Danh Dinh
 * Author URI:        https://www.9thwonder.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpchecklist
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// HTML Minifier
function minify_html($input) {
    if(trim($input) === "") return $input;
    // Remove extra white-space(s) between HTML attribute(s)
    $input = preg_replace_callback('#<([^\/\s<>!]+)(?:\s+([^<>]*?)\s*|\s*)(\/?)>#s', function($matches) {
        return '<' . $matches[1] . preg_replace('#([^\s=]+)(\=([\'"]?)(.*?)\3)?(\s+|$)#s', ' $1$2', $matches[2]) . $matches[3] . '>';
    }, str_replace("\r", "", $input));
    // Minify inline CSS declaration(s)
    return preg_replace(
        array(
            '#<(img|input)(>| .*?>)#s',
            '#(<!--.*?-->)|(>)(?:\n*|\s{2,})(<)|^\s*|\s*$#s',
            '#(<!--.*?-->)|(?<!\>)\s+(<\/.*?>)|(<[^\/]*?>)\s+(?!\<)#s', // t+c || o+t
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<[^\/]*?>)|(<\/.*?>)\s+(<\/.*?>)#s', // o+o || c+c
            '#(<!--.*?-->)|(<\/.*?>)\s+(\s)(?!\<)|(?<!\>)\s+(\s)(<[^\/]*?\/?>)|(<[^\/]*?\/?>)\s+(\s)(?!\<)#s', // c+t || t+o || o+t -- separated by long white-space(s)
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<\/.*?>)#s', // empty tag
            '#<(img|input)(>| .*?>)<\/\1>#s', // reset previous fix
            '#(&nbsp;)&nbsp;(?![<\s])#', // clean up ...
            '#(?<=\>)(&nbsp;)(?=\<)#', // --ibid
            '#\s*<!--(?!\[if\s).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s'
        ),
        array(
            '<$1$2</$1>',
            '$1$2$3',
            '$1$2$3',
            '$1$2$3$4$5',
            '$1$2$3$4$5$6$7',
            '$1$2$3',
            '<$1$2',
            '$1 ',
            '$1',
            ""
        ),
    $input);
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPCHECKLIST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpchecklist-activator.php
 */
function activate_wpchecklist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpchecklist-activator.php';
	Wpchecklist_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpchecklist-deactivator.php
 */
function deactivate_wpchecklist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpchecklist-deactivator.php';
	Wpchecklist_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpchecklist' );
register_deactivation_hook( __FILE__, 'deactivate_wpchecklist' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpchecklist.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/simple_html_dom.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpchecklist() {

	$plugin = new Wpchecklist();
	$plugin->run();

}
run_wpchecklist();

function check_confirm_url() {
    return false !== strpos( $_SERVER[ 'REQUEST_URI' ], '/wpcheck9th?key=dbFnnq43nRAEWj94' );
}
add_action( 'init', 'process_automation' );
function process_automation() {
    if( check_confirm_url() ) {
    	require_once plugin_dir_path( __FILE__ ) . 'inc/helper.php';
    	$helper = new Helper();
        $all = $helper->generator();
    }
}


//we use 'init' action to use ob_start()
if(!is_admin()){
	add_action( 'init', 'process_post' );
	function process_post() {
	     ob_start();
	}
	add_action('shutdown', function() {
	    $final = '';
	    $levels = ob_get_level();

	    for ($i = 0; $i < $levels; $i++) {
	        $final .= ob_get_clean();
	    }
	    echo apply_filters('final_output', $final);
	}, 0);

	add_filter('final_output', function($output) {
		if(!is_admin()){
			// $token = md5(uniqid(rand().strtotime("now"), true));
			// file_put_contents(__DIR__.'/html/'.$token.'.html', minify_html($output));
			if(isset($_REQUEST['token-9th'])){
				$token_9th = trim($_REQUEST['token-9th']);
				if(file_exists(__DIR__.'/html/'.$token_9th.'.html')){
					$output = file_get_contents(__DIR__.'/html/'.$token_9th.'.html');
					$button_add = '<div class="bt-new-token d-none d-lg-block"><a class="btn btn-primary new-editor-a" href="javascript:void(0)" style="position: fixed;top: 0px;right: 0px;z-index: 9999;">New Editor</a></div></body>'; 
					$output = str_replace('</body>', $button_add, $output);
				}
			}
			return $output;
		}
	    
	});
	// if(isset($_REQUEST['token-9th']) && !empty($_REQUEST['token-9th'])){
	// 	$token_9th = trim($_REQUEST['token-9th']);
	// 	if(isset($_REQUEST['token-9th'])){
	// 		$output = file_get_contents(__DIR__.'/html/'.$token_9th.'.html');
	// 		$html = str_get_html($output);
	// 		$html->find('.maiking-content', 1)->innertext = 'sda zxczczxczcz';
	// 		file_put_contents(__DIR__.'/html/'.$token_9th.'.html', minify_html($html));
	// 	}
	// }
}

// var_dump($html);
add_action("wp_ajax_update_html_by_token", "update_html_by_token");
add_action("wp_ajax_nopriv_update_html_by_token", "update_html_by_token");
function update_html_by_token() {
   $_POST['url'] = str_replace(WP_SITEURL, DEV_URL, $_POST['url']);
   $datas = $_POST;
   $output = file_get_contents($datas['url']);
   $html = str_get_html($output);
	$html->find($datas['selector'], $datas['index'])->innertext = stripslashes($datas['html']);
	file_put_contents(__DIR__.'/html/'.$datas['token_9th'].'.html', minify_html($html));
   	die;
}


add_action("wp_ajax_generator_token", "generator_token");
add_action("wp_ajax_nopriv_generator_token", "generator_token");
function generator_token() {
	$token = md5(uniqid(rand().strtotime("now"), true));
	echo json_encode(array('token'=>$token));
   	die;
}




add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);
function add_type_attribute($tag, $handle, $src) {
    if ( 'js-edit-page' !== $handle ) {
        return $tag;
    }
    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    return $tag;
}

add_action('wp_head', 'add_tokent_head');
function add_tokent_head(){
	if(isset($_REQUEST['token-9th']) && !empty($_REQUEST['token-9th'])){
		$token_9th = trim($_REQUEST['token-9th']);
	}
	if(isset($token_9th) && !empty($token_9th)) {
		echo '<script type="text/javascript">var token_9th="'.$token_9th.'"</script>';
	}else{
		echo '<script type="text/javascript">var token_9th=""</script>';
	}
}

// if(!isset($_REQUEST['token-9th']) || empty($_REQUEST['token-9th'])){
	add_action('admin_bar_menu', 'add_item', 100);
	function add_item( $admin_bar ){
		  global $pagenow;
		  if(!isset($_REQUEST['token-9th']) || empty($_REQUEST['token-9th'])){
		  	$admin_bar->add_menu( array( 'id'=>'en-edit-content','title'=>'Enable Edit Content','href'=>'javascript:void(0)' ) );
		  }else{
		  	$admin_bar->add_menu( array( 'id'=>'en-edit-content','title'=>'New Editor','href'=>'javascript:void(0)' ) );
		  }
	}
// }

add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl() {

   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}


function wpse87681_enqueue_custom_stylesheets() {
    if ( ! is_admin() && current_user_can('editor') || current_user_can('administrator')) {
        wp_enqueue_style( 'css-edit-page', plugin_dir_url( __FILE__ ) . 'public/assets/css.css', array(), false, 'all' );
		wp_enqueue_style( 'css-edit-notify', plugin_dir_url( __FILE__ ) . 'public/assets/alertify.min.css', array(), false, 'all' );
		wp_enqueue_script( 'js-edit-page', plugin_dir_url( __FILE__ ) . 'public/assets/app-add-content.js', array(), false, true );
		wp_enqueue_script( 'js-edit-notify', plugin_dir_url( __FILE__ ) . 'public/assets/alertify.min.js', array(), false, true );
    }
}
add_action( 'wp_enqueue_scripts', 'wpse87681_enqueue_custom_stylesheets', 11 );


