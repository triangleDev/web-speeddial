<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Core {

    public function before()
    {
        Auth::instance()->logout();
        parent::before();
    }
	public function action_index()
	{
        $this->register_css_file('impress/impress-demo');
        $this->register_js_file('impress/impress');
	}

    public function action_about_us()
    {

    }

    public function action_contact()
    {

    }

    public function action_login()
    {

    }

    public function action_register()
    {

    }
} // End Welcome
