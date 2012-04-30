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
       echo 'fffdf';
       $model = Model_Users::find(9);
       var_dump($model);
       exit;
    }

    public function action_register()
    {
        $model = new Model_Users;
        $model->login = 'pussbb';
        $model->email = 'pussbb@gmai.com';
        $model->password = '123456';
        if ( ! $model->register())
        {
            var_dump($model->errors());
        }
        $this->render_nothing();
    }
} // End Welcome
