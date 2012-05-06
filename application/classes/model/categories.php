<?php defined('SYSPATH') or die('No direct script access.');

class Model_Categories extends Model
{
    ///private $db_table = 'categories';

    public function delete($id)
    {
        if ( ! is_numeric($id))
            throw new Kohana_HTTP_Exception_500;

        return DB::delete($this->db_table)->where('id' , '=', $id)->execute();
    }

    public function add()
    {
        if ( ! Valid::not_empty($this->name))
        {
            $this->add_error('cat_name', __('must_be_not_empty'));
            return FALSE;
        }
        $this->insert(array('name','user_id','parent_id'));
        return $this->exec();
    }

    public  static function user_collection($user_id)
    {
        $categories = self::find_all(array(
            'user_id' => Auth::instance()->current_user()->id,
        ))->records;
        $result = array(
            NULL => __('no_parent'),
        );
        foreach($categories as $item)
        {
            $result[$item['id']] = $item['name'];
        }
        return $result;
    }
}