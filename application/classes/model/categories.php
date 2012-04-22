<?php defined('SYSPATH') or die('No direct script access.');

class Model_Categories extends Model
{
    private $db_table = 'categories';

    public function delete($id)
    {
        if ( ! is_numeric($id))
            throw new Kohana_HTTP_Exception_500;

        return DB::delete($this->db_table)->where('id' , '=', $id)->execute();
    }
}