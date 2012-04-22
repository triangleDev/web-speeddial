<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Panel_Panel extends Controller_Core {

    public function before()
    {
        Auth::instance()->authorize();
        parent::before();
    }

    public function action_index()
    {

    }

}