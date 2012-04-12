<?php defined('SYSPATH') or die('No direct script access.');

class HTML extends Kohana_HTML {

    public static function tag($name_with_attributes, $enclose = true)
    {
        $tag_name = $name_with_attributes[0];
        unset($name_with_attributes[0]);
        $result = '<'.$tag_name.HTML::attributes($name_with_attributes);
        return $enclose ? $result.'/>' : $result.'>';
    }

    // markup helper
    public static function button($base_prefix, $label)
    {
        $results = array(
            '<div class="'.$base_prefix.'-left"></div>',
            '<div class="'.$base_prefix.'-middle">'.$label.'</div>',
            '<div class="'.$base_prefix.'-right"></div>'
        );
        return implode('', $results);
    }

    public static function img($image_url, $attributes = array())
    {
        if (strpos($image_url, '://') === FALSE)
        {
            $image_url = Url::site_root() . '/media/' . $image_url;
        }
        $attributes['src'] = $image_url;
        array_unshift($attributes, 'img');
        return self::tag($attributes);
    }
}
