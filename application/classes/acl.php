<?php defined('SYSPATH') or die('No direct script access.');

class ACL extends Singleton{

    public function allowed($controller_instance, $user=null)
    {
        return TRUE;
    }
}