<?php

namespace App\Services;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

class HookActions
{
    public function init()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title' => 'Global Theme Settings',
                'menu_title' => 'Global Theme Settings',
                'menu_slug'  => 'global-settings',
                'capability' => 'edit_posts',
                'redirect'   => false,
                'icon_url'   => 'dashicons-admin-generic',
                'position'   => '50'
            ));
        }
        add_action('wp_enqueue_scripts', array($this, 'wpEnqueueScripts'), 100);
        add_action('after_setup_theme', array($this, 'afterSetupTheme'), 20);
        add_action('widgets_init', array($this, 'widgetsInit'));
        add_action('the_post', array($this, 'thePost'));
        add_action('after_setup_theme', array($this, 'afterSetupThemeOption'));
        add_action('customize_register', array($this, 'customizeRegister'));
        add_action('customize_preview_init', array($this, 'customizePreviewInit'));
    }

    /**
     * Theme customizer Admin
     */
    public function customizeRegister(\WP_Customize_Manager $wpCustomize)
    {
        // Add postMessage support
        $wpCustomize->get_setting('blogname')->transport = 'postMessage';
        $wpCustomize->selective_refresh->add_partial('blogname', [
            'selector' => '.brand',
            'render_callback' => function () {
                bloginfo('name');
            }
        ]);
    }

    /**
     * Customizer JS Admin
     */
    public function customizePreviewInit()
    {
        wp_enqueue_script(
            'sage/customizer.js',
            \App\asset_path('scripts/customizer.js'),
            ['customize-preview'],
            null,
            true
        );
    }

    /**
     * Setup Sage options
     */
    public function afterSetupThemeOption()
    {
        /**
         * Add JsonManifest to Sage container
         */
        \App\sage()->singleton('sage.assets', function () {
            return new JsonManifest(
                \App\config('assets.manifest'),
                \App\config('assets.uri')
            );
        });

        /**
         * Add Blade to Sage container
         */
        \App\sage()->singleton('sage.blade', function (Container $app) {
            $cachePath = \App\config('view.compiled');
            if (!file_exists($cachePath)) {
                wp_mkdir_p($cachePath);
            }
            (new BladeProvider($app))->register();
            return new Blade($app['view']);
        });

        /**
         * Create @asset() Blade directive
         */
        \App\sage('blade')->compiler()->directive('asset', function ($asset) {
            return "<?= \App\asset_path({$asset}); ?>";
        });
    }

    /**
     * Register sidebars
     */
    public function widgetsInit()
    {
        $config = [
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ];
        register_sidebar([
            'name'          => __('Primary', 'sage'),
            'id'            => 'sidebar-primary'
        ] + $config);
        register_sidebar([
            'name'          => __('Footer', 'sage'),
            'id'            => 'sidebar-footer'
        ] + $config);
    }

    /**
     * Updates the `$post` variable on each iteration of the loop.
     * Note: updated value is only available for subsequently loaded views, such as partials
     */
    public function thePost($post)
    {
        \App\sage('blade')->share('post', $post);
    }

    /**
     * Theme setup
     */
    public function afterSetupTheme()
    {
        /**
         * Enable features from Soil when plugin is activated
         * @link https://roots.io/plugins/soil/
         */
        add_theme_support('soil-clean-up');
        add_theme_support('soil-jquery-cdn');
        add_theme_support('soil-nav-walker');
        add_theme_support('soil-nice-search');
        add_theme_support('soil-relative-urls');

        /**
         * Enable plugins to manage the document title
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
         */
        add_theme_support('title-tag');

        /**
         * Register navigation menus
         * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
         */
        register_nav_menus([
            'primary_navigation' => __('Primary Navigation', 'sage'),
            'footer_navigation' => __('Footer Navigation', 'sage')
        ]);

        /**
         * Enable post thumbnails
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /**
         * Enable HTML5 markup support
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
         */
        add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

        /**
         * Enable selective refresh for widgets in customizer
         * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
         */
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Use main stylesheet for visual editor
         * @see resources/assets/styles/layouts/_tinymce.scss
         */
        add_editor_style(\App\asset_path('styles/main.css'));
    }

    /**
     * Theme assets
     */
    public function wpEnqueueScripts()
    {
        // Css load on Server
        wp_enqueue_style(
            'sage/appcss',
            \App\asset_path('styles/app.css'),
            false,
            null,
            SCREEN
        );

        if (is_single() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
