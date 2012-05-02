<?php defined('SYSPATH') or die('No direct script access.');

class Model_Users extends Model
{

    public function login()
    {

    }

    public function register()
    {
        $this->insert(array('login', 'email', 'password', 'api_key'));
        $this->api_key = uniqid();

        if ( ! Valid::email($this->email))
        {
            $this->add_error('email', __('must_be_valid_email'));
            return FALSE;
        }

        if ( $this->exists(array('login', 'email')))
        {
            $this->add_error('user_name', __('already_exists'));
            $this->add_error('email', __('already_exists'));
            return FALSE;
        }
        $this->password = md5($this->password);

        $result = $this->exec();
        return $result;
    }
}