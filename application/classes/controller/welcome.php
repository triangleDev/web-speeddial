<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Core {

    protected  $check_access = FALSE;

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

} // End Welcome
