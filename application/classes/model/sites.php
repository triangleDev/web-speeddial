<?php defined('SYSPATH') or die('No direct script access.');

class Model_Sites extends Model
{
    public static function update_title_if_empty($id, $title)
    {
        DB::update('sites')
            ->set(array(
                'title' => $title,
            ))
            ->where('title', '=', '')
            ->and_where('id', '=', $id)->execute();
    }
}