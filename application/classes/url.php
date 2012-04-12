<?php defined('SYSPATH') or die('No direct script access.');

class Url extends Kohana_Url {

    public static function path($url, $controller = null)
    {
        if ($url === 'root' || $url[0] === 'root')
            return Url::site_root();

        if ( ! is_array($url))
            return $url;

        $parts = explode('/', $url[0]);
        $count = count($parts);

        $action = $parts[$count - 1] ? $parts[$count - 1] : 'index';
        $directory = '';
        switch ($count)
        {
            case 1:
                $controller = $controller ? $controller->request->controller() : '';
                break;
            case 2:
                $controller = $parts[0];
                break;
            case 3:
                $directory = $parts[0];
                $controller = $parts[1];
                break;
            default:
                throw new Kohana_Exception(
                    __("invalid_route :route", array(':route' => $url))
                );
        }


        $id = Arr::get($url, 'id', '');
        $action = $action === 'index' ? '' : $action;
        $uri = implode('/',
            array_filter(array($directory, $controller, $action, $id))
        );
        unset($url[0]);
        unset($url['id']);

        $uri = URL::base('http', TRUE).$uri;

        return (! $url) ? $uri : $uri.'?'.http_build_query($url);
    }

    public static function site_root()
    {
        $base = URL::base(TRUE, TRUE);
       /// $root = Url::site(Route::get('default')->uri());
        return rtrim($base, '/'); // remove trailing
    }

    public static function link_to($path, $title, $attributes = NULL, $enclose = TRUE)
    {
        return HTML::anchor(
            Url::path( is_array($path) ? $path : array($path) ),
            $title,
            $attributes
        );
    }

    public static function remove_url_prefix($url)
    {
        $url = trim($url);
        $match_success = preg_match('/^\w+:\/*(?:www.)*(.*)/is', $url, $matches);
        if ($match_success && $matches[1])
        {
            $url = $matches[1];
        }
        return strtolower($url);
    }

    public static function extract_domain($url)
    {
        $url = self::remove_url_prefix($url);
        if (preg_match('/^([\w.-]*)(.*)/is', $url, $matches))
        {
            return $matches[1];
        }
        return '';
    }

    public static function get_n_level_domain($domain = '', $n = 2)
    {
        $levels_array = explode('.',$domain);
        if ($n == count($levels_array))
        {
            return $domain;
        }
        if (empty($levels_array) || $n > count($levels_array))
        {
            return FALSE;
        }
        return implode('.',array_slice($levels_array, -$n));
    }
}