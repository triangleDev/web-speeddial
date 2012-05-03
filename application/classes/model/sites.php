<?php defined('SYSPATH') or die('No direct script access.');

class Model_Sites extends Model
{
    public static function update_title_if_empty($id, $title)
    {
        if ( ! $id)
            return;

        DB::update('sites')
            ->set(array(
                'title' => $title,
            ))
            ->where('title', '=', '')
            ->and_where('id', '=', $id)->execute();
    }

    public static function update_meta($id, $params)
    {
        if ( ! $id)
            return;
        $params = array_filter($params);
        if ( ! $params)
            return;

        DB::update('sites')
            ->set($params)
            ->where('id', '=', $id)->execute();
    }
}