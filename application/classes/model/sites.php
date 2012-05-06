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

    public function add_site()
    {
        if ( ! Valid::url($this->link))
        {
            $this->add_error('url', __('must_be_valid_url'));
            return FALSE;
        }
        if ( isset($this->id))
        {
            ///update
            //$this->
            retrun;
        }
        $this->insert(array('title', 'user_id', 'link', 'category'));
        $result = $this->exec();
        if ( ! $result)
            return $result;

        $site_id = $this->last_inserted_id;
        $screenshort = new Model_Screenshorts();
        return $screenshort->add($site_id);


    }
}