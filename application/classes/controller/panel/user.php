<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Panel_User extends Controller_Core {

    public function action_logout()
    {
        Auth::instance()->logout();
        $this->redirect('/');
    }

    public function action_account_info()
    {
      $this->render_nothing();
    }

    public function action_settings()
    {
      $this->render_nothing();
    }
}