<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Panel_User extends Controller_Core {

    public function action_logout()
    {
        Session::instance()->destroy();
        $this->redirect('/');
    }

}