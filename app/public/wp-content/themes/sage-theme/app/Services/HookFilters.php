<?php

namespace App\Services;

class HookFilters
{
    public function init()
    {
        add_filter('body_class', array($this, 'bodyClass'));
        add_filter('excerpt_more', array($this, 'excerptMore'));
        /**
         * Template Hierarchy should search for .blade.php files
         */
        collect([
            'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
            'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
        ])->map(function ($type) {
            add_filter("{$type}_template_hierarchy", '\App\filter_templates');
        });
        add_filter('template_include', array($this, 'templateInclude'), PHP_INT_MAX);
        add_filter('comments_template', array($this, 'commentsTemplate'), 100);
    }

    /**
     * Render comments.blade.php
     */
    public function commentsTemplate($commentsTemplate)
    {
        $commentsTemplate = str_replace(
            [get_stylesheet_directory(), get_template_directory()],
            '',
            $commentsTemplate
        );

        $data = collect(get_body_class())->reduce(function ($data, $class) use ($commentsTemplate) {
            return apply_filters("sage/template/{$class}/data", $data, $commentsTemplate);
        }, []);

        $themeTemplate = locate_template(["views/{$commentsTemplate}", $commentsTemplate]);

        if ($themeTemplate) {
            echo \App\template($themeTemplate, $data);
            return get_stylesheet_directory().'/index.php';
        }

        return $commentsTemplate;
    }


    /**
     * Render page using Blade
     */
    public function templateInclude($template)
    {
        collect(['get_header', 'wp_head'])->each(function ($tag) {
            ob_start();
            do_action($tag);
            $output = ob_get_clean();
            remove_all_actions($tag);
            add_action($tag, function () use ($output) {
                echo $output;
            });
        });
        $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
            return apply_filters("sage/template/{$class}/data", $data, $template);
        }, []);
        if ($template) {
            echo \App\template($template, $data);
            return get_stylesheet_directory().'/index.php';
        }
        return $template;
    }

    /**
     * Add "… Continued" to the excerpt
     */
    public function excerptMore()
    {
        return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
    }

    /**
     * Add <body> classes
     */
    public function bodyClass(array $classes)
    {
        /** Add page slug if it doesn't exist */
        if ((is_single() || is_page() && !is_front_page()) && (!in_array(basename(get_permalink()), $classes))) {
            $classes[] = basename(get_permalink());
        }

        /** Add class if sidebar is active */
        if (\App\display_sidebar()) {
            $classes[] = 'sidebar-primary';
        }

        /** Clean up class names for custom templates */
        $classes = array_map(function ($class) {
            return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
        }, $classes);
        return array_filter($classes);
    }
}
