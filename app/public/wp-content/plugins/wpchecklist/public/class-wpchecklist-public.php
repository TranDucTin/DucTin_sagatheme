<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.9thwonder.com
 * @since      1.0.0
 *
 * @package    Wpchecklist
 * @subpackage Wpchecklist/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wpchecklist
 * @subpackage Wpchecklist/public
 * @author     Danh Dinh <danh.dinh@9thwonder.com>
 */
class Wpchecklist_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpchecklist_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpchecklist_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'css-edit-page', plugin_dir_url( __FILE__ ) . 'assets/css.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'css-edit-notify', plugin_dir_url( __FILE__ ) . 'assets/alertify.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpchecklist_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpchecklist_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'js-edit-page', plugin_dir_url( __FILE__ ) . 'assets/app-add-content.js', array(), false, true );
		wp_enqueue_script( 'js-edit-notify', plugin_dir_url( __FILE__ ) . 'assets/alertify.min.js', array(), false, true );
	}

}
