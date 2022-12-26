<?php

namespace App\Services;

class RegisterPostType
{
    private $taxonomyName = TAXONOMY_NAME;
    private $taxonomySlug = TAXONOMY_SLUG;
    private $typeName = 'type_name';
    private $typeSlug = 'type_slug';
    private $types = [];

    public function init()
    {
        $this->types = array(
            'leadership' => true,
            'news' => true,
            'event' => true,
            'resource' => true,
            'location' => true,
            'faq' => true,
            'testimonial' => true,
        );
        add_action('init', array($this, 'setup'));
    }

    public function setup()
    {
        $this->setupTypes($this->types);
    }

    public function setupTypes($types)
    {
        if ($types) {
            //Leadership
            $this->registerLeadership($types);
            //News
            $this->registerNews($types);
            //Event
            $this->registerEvent($types);
            //Resource
            $this->registerResource($types);
            //Location
            $this->registerLocation($types);
            //Faq
            $this->registerFaq($types);
            //testimonial
            $this->registerTestimonial($types);
        }
    }

    private function registerLeadership($types)
    {
        $leadership = 'leadership';
        if (isset($types[$leadership]) && $types[$leadership]) {
            $this->registerType(array(
                $this->taxonomyName => 'Leadership category',
                $this->taxonomySlug => 'category_leadership',
                $this->typeName => 'Leadership',
                $this->typeSlug => $leadership,
                FEATURE_IMG_NAME => 'Avatar',
                ICON_ID => 'dashicons-groups',
            ));
        }
    }

    private function registerNews($types)
    {
        if (isset($types['news']) && $types['news']) {
            $this->registerType(array(
                $this->taxonomyName => 'News category',
                $this->taxonomySlug => 'category_news',
                $this->typeName => 'News',
                $this->typeSlug => 'news',
                ICON_ID => 'dashicons-media-spreadsheet',
            ));
        }
    }

    private function registerEvent($types)
    {
        $event = 'event';
        if (isset($types[$event]) && $types[$event]) {
            $this->registerType(array(
                $this->taxonomyName => 'Event category',
                $this->taxonomySlug => 'category_event',
                $this->typeName => 'Event',
                $this->typeSlug => $event,
                ICON_ID => 'dashicons-megaphone',
            ));
        }
    }
    private function registerResource($types)
    {
        $resource = 'resource';
        if (isset($types[$resource]) && $types[$resource]) {
            $this->registerType(array(
                $this->taxonomyName => 'Resource category',
                $this->taxonomySlug => 'category_resource',
                $this->typeName => 'Resource',
                $this->typeSlug => $resource,
                ICON_ID => 'dashicons-schedule',
            ));
        }
    }
    private function registerLocation($types)
    {
        $location = 'location';
        if (isset($types[$location]) && $types[$location]) {
            $this->registerType(array(
                $this->typeName => 'Location',
                $this->typeSlug => $location,
                ICON_ID => 'dashicons-location',
            ));
        }
    }
    private function registerFaq($types)
    {
        if (isset($types['faq']) && $types['faq']) {
            $this->registerType(array(
                $this->taxonomyName => 'Faq category',
                $this->taxonomySlug => 'category_faq',
                $this->typeName => 'Faq',
                $this->typeSlug => 'faq',
                ICON_ID => 'dashicons-format-status',
            ));
        }
    }
    private function registerTestimonial($types)
    {
        $testimonial = 'testimonial';
        if (isset($types[$testimonial]) && $types[$testimonial]) {
            $this->registerType(array(
                $this->taxonomyName => 'Testimonial category',
                $this->taxonomySlug => 'category_testimonial',
                $this->typeName => 'Testimonial',
                $this->typeSlug => $testimonial,
                ICON_ID => 'dashicons-format-chat',
            ));
        }
    }

    private function registerType($args = array())
    {
        if (!empty($args)) {
            $taxoName = isset($args[TAXONOMY_NAME]) ? $args[TAXONOMY_NAME] : null;
            $taxoSlug = isset($args[TAXONOMY_SLUG]) ? $args[TAXONOMY_SLUG] : null;
            $argsTypeName = $args['type_name'];
            $argsTypeSlug = $args['type_slug'];
            $featureImgName = isset($args[FEATURE_IMG_NAME]) ? $args[FEATURE_IMG_NAME] : 'Feature image';
            $icon = $args[ICON_ID] ? $args[ICON_ID] : 'dashicons-admin-post';
            $rewriteSlug = isset($args[REWRITE_SLUG]) ? $args[REWRITE_SLUG] : $argsTypeSlug;
            if ($taxoSlug) {
                // add new taxonomy
                $labelsTax = array(
                    'name' => _x($taxoName, 'taxonomy general name'),
                    'singular_name' => _x('Category', 'taxonomy singular name'),
                    'search_items' => __('Search Categories'),
                    'all_items' => __('All Categories'),
                    'parent_item' => __('Parent Category'),
                    'parent_item_colon' => __('Parent Category:'),
                    'edit_item' => __('Edit Category'),
                    'update_item' => __('Update Category'),
                    'add_new_item' => __('Add New Category'),
                    'new_item_name' => __('New Category Name'),
                    'menu_name' => __($taxoName),
                );

                $argsTax = array(
                    'hierarchical' => true,
                    'labels' => $labelsTax,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'query_var' => true,
                    'rewrite' => array(
                        'slug' => false,
                        'with_front' => false,
                    ),
                );
                register_taxonomy($taxoSlug, array($argsTypeSlug), $argsTax);
                flush_rewrite_rules();
            }
            if ($argsTypeSlug) {
                $labels = array(
                    'name' => _x("$argsTypeName", 'Post Type General Name'),
                    'singular_name' => _x("$argsTypeName", 'Post Type Singular Name'),
                    'menu_name' => __("$argsTypeName"),
                    'parent_item_colon' => __("Parent $argsTypeName:"),
                    'all_items' => __("All $argsTypeName"),
                    'view_item' => __("View $argsTypeName"),
                    'add_new_item' => __("Add New $argsTypeName"),
                    'add_new' => __("Add New"),
                    'edit_item' => __("Edit $argsTypeName"),
                    'update_item' => __("Update $argsTypeName"),
                    'search_items' => __("Search $argsTypeName"),
                    'not_found' => __("Not found"),
                    'not_found_in_trash' => __("Not found in Trash"),
                    'featured_image' => __($featureImgName),
                    'set_featured_image' => __("Set $featureImgName"),
                    'remove_featured_image' => __("Remove $featureImgName"),
                    'use_featured_image' => __("Use as $featureImgName"),
                );
                $args = array(
                    'label' => __("$argsTypeName"),
                    'description' => __("Attached to the $argsTypeName pages"),
                    'labels' => $labels,
                    'supports' => array('title', 'editor', 'thumbnail'),
                    'taxonomies' => array($taxoSlug),
                    'hierarchical' => false,
                    'public' => true,
                    'show_ui' => true,
                    'show_in_menu' => true,
                    'show_in_nav_menus' => true,
                    'show_in_admin_bar' => true,
                    'menu_position' => 4,
                    'menu_icon' => $icon,
                    'can_export' => true,
                    'has_archive' => false,
                    'exclude_from_search' => false,
                    'publicly_queryable' => true,
                    'capability_type' => 'post',
                    // 'rewrite' => $post_slug,
                    'rewrite' => array('slug' => $rewriteSlug),
                );

                register_post_type($argsTypeSlug, $args);
                flush_rewrite_rules();
            }
        }
    }
}
