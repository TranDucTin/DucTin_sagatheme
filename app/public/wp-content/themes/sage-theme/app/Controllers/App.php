<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Services\Queries;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        $title = "The Encompass Platform Seamlessly Connects the Supply Chain, Allowing You to:";
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            $title = get_the_archive_title();
        }
        if (is_search()) {
            $title = sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            $title = __('Not Found', 'sage');
        }
        if (empty($title)) {
            $title = get_the_title();
        }
        return $title;
    }

    public static function getLogo()
    {
        $logo = get_field('ns_header_logo', ACF_OPTION);
        $url = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/logo-sagetheme.svg';
        $aperity = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/aperity-logo.png';
        $cba = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/cba-logo.png';
        $provi = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/provi-logo.png';
        $salsify = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/salsify-logo.png';
        $script = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/script-logo.png';
        $untappd = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/untappd-logo.png';
        $advance = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/img-sagatheme/advance.png';
        $barringer = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/img-sagatheme/barringer.png';
        $eagle = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/img-sagatheme/eagle_rock.png';
        $firestone = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/img-sagatheme/firestone_logo_small1.png';
        $towns = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/img-sagatheme/Towns.png';
        $whistle = ($logo && $logo['url']) ? $logo['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/img-sagatheme/WhistlePig_Logo_Primary.png';
        $alt = ($logo && $logo['alt']) ? $logo['alt'] : 'logo';
        $href = home_url();
        return compact('url', 'aperity', 'cba', 'provi', 'salsify', 'script', 'untappd', 'advance', 'barringer', 'eagle', 'firestone', 'towns', 'whistle','alt', 'href');
    }

    public static function getBanner()
    {
        $banner = get_field('ns_header_banner', ACF_OPTION);
        $Banner = ($banner && $banner['url']) ? $banner['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/bg_Banner.png';
        $Business = ($banner && $banner['url']) ? $banner['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/BusinessImg.png';
        $Hide = ($banner && $banner['url']) ? $banner['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/bgHide.png';
        $lorem = ($banner && $banner['url']) ? $banner['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/lorem.jpg';
        $footer = ($banner && $banner['url']) ? $banner['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/footer.png';
        $alt = ($banner && $banner['alt']) ? $banner['alt'] : 'banner';
        $alt1 = ($banner && $banner['alt']) ? $banner['alt'] : 'business';
        $href = home_url();
        return compact('Banner', 'Business', 'Hide', 'lorem', 'footer', 'alt', 'alt1', 'href');
    }

    public static function getIcon()
    {
        $icon = get_field('ns_header_Icon', ACF_OPTION);
        $icon1 = ($icon && $icon['url']) ? $icon['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/icon1.svg';
        $icon2 = ($icon && $icon['url']) ? $icon['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/icon2.svg';
        $icon3 = ($icon && $icon['url']) ? $icon['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/icon3.svg';
        $icon4 = ($icon && $icon['url']) ? $icon['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/icon4.svg';
        $icon5 = ($icon && $icon['url']) ? $icon['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/icon5.svg';
        $icon6 = ($icon && $icon['url']) ? $icon['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/icon6.svg';
        $icon7 = ($icon && $icon['url']) ? $icon['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/icon7.svg';
        $alt = ($icon && $icon['alt']) ? $icon['alt'] : 'icon';
        $href = home_url();
        return compact('icon1', 'icon2', 'icon3', 'icon4','icon5', 'icon6','icon7', 'alt', 'href');
    }

    public static function getBannerR()
    {
        $bannerR = get_field('ns_header_banner', ACF_OPTION);
        $url = ($bannerR && $bannerR['url']) ? $bannerR['url'] : TEMPLATE_ASSETS_URL . '/images/img-saga/BannerR.png';
        $alt = ($bannerR && $bannerR['alt']) ? $bannerR['alt'] : 'bannerR';
        $href = home_url();
        return compact('url', 'alt', 'href');
    }

    public static function getFooterAddress()
    {
        return get_field('ns_footer_address', ACF_OPTION);
    }

    public static function getCopyRight()
    {
        return get_field('ns_copyright', ACF_OPTION);
    }

    public static function getTrackingCode($position = '')
    {
        if ($position) {
            switch ($position) {
                case 'in_head':
                    $code = get_field('ns_tracking_head', ACF_OPTION);
                    break;
                case 'after_open_body':
                    $code = get_field('ns_tracking_after_body', ACF_OPTION);
                    break;
                case 'before_close_body':
                    $code = get_field('ns_tracking_before_body', ACF_OPTION);
                    break;
                default:
                    $code = '';
                    break;
            }
            return $code;
        }
        return '';
    }

    public static function getFavicon()
    {
        $favicon = get_field('ns_favicon', ACF_OPTION);
        return $favicon ? $favicon : '';
    }

    public static function getAppleIcon()
    {
        $icon = get_field('ns_apple_touch_icon', ACF_OPTION);
        return $icon ? $icon : '';
    }
    /**
     * Get content 404.
     *
     * @return string
     */
    public static function getContent404()
    {
        return Queries::getOptionField('ns_404_page_content');
    }

    /**
     * Get Main Menu
     */
    public static function getMainNav()
    {
        $location = 'primary_navigation';
        if (has_nav_menu($location)) {
            return wp_nav_menu(array(
                THEME_LOCATION => $location,
                CONTAINER => false,
                DEPTH => 2,
                WALKER => new \App\Services\Nav\C8ThemeHeaderMenu(),
                'menu_class' => 'main-menu-ul navbar-nav list-none flex mb-0 p-0 text-white flex-col text-inherit
                lg:flex-row lg:justify-end',
                ECHO_TEXT => false,
            ));
        } else {
            return '';
        }
    }
    /**
     * Get Footer Menu
     */
    public static function getFooterNav()
    {
        $location = 'footer_navigation';
        if (has_nav_menu($location)) {
            return wp_nav_menu(array(
                THEME_LOCATION => $location,
                ITEMS_WRAP => '%3$s',
                CONTAINER => false,
                DEPTH => 2,
                WALKER => new \App\Services\Nav\C8ThemeFooterMenu(),
                ECHO_TEXT => false,
            ));
        } else {
            return 'text';
        }
    }

    // public static function getTitle()
    // {

    //     return "Module";
    // }
}
