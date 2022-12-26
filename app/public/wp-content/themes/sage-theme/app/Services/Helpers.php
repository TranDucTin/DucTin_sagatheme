<?php

namespace App\Services;

trait Helpers
{
    public static function getVideoLink($link)
    {
        $fullLink = $link;
        $youtube = 'youtube';
        $vimeo = 'vimeo';
        if (!empty($link)) {
            $t = strpos($link, $youtube);
            $type = !empty($t) ? $youtube : $vimeo;
        }
        if ($type === $youtube) {
            preg_match(PREG_MATCH_YOUTUBE, $link, $matches);
            $id = $matches[1];
            $fullLink = 'https://www.youtube.com/embed/' . $id;
        }
        if ($type === $vimeo && preg_match(PREG_MATCH_VIMEO, $link, $regs)) {
            $id = $regs[3];
            $fullLink = 'https://player.vimeo.com/video/' . $id;
        }
        return $fullLink;
    }

    public static function getImageSrc($src = '', $size = '450x320')
    {
        if (!empty($src)) {
            return $src;
        }
        return TEMPLATE_ASSETS_URL . '/images/default/' . $size . '.jpeg';
    }

    public static function getImageObj($imageObj)
    {
        $alt = !empty($imageObj['alt']) ? $imageObj['alt'] : 'Image';
        $url = !empty($imageObj['url']) ? $imageObj['url'] : static::getImageSrc();

        $imageObj['alt'] = $alt;
        $imageObj['url'] = $url;
        return $imageObj;
    }
    /**
     * @param string $file
     * @param array $data
     * @return string
     */
    public static function ajaxRender($template, $data = [])
    {
        $file = locate_template(["views/partials/ajax/{$template}", $template]);

        return \App\sage('blade')->render($file, $data);
    }
}
