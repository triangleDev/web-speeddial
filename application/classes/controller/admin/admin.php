<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Admin extends Controller_Core {

    private $user = NULL;

    public function before()
    {
        parent::before();
        $this->view->user = $this->user = Auth::instance()->current_user();

    }

    public function action_index()
    {

    }

}