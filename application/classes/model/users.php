<?php defined('SYSPATH') or die('No direct script access.');

class Model_Users extends Model
{

    public function validate_login()
    {

    }
    public function login()
    {

    }

    public function register()
    {
        $this->insert(array('login', 'email', 'password'));
        $this->exec();
        var_dump($this);
    }
}