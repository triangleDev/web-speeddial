<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Demon extends Controller {

    public function action_index()
    {
        $rpc = RPC::factory();
        $methods = array(
            "speeddial.gettask" => array(
                "function" => array($this,'gettask'),
                "signature" => array(
                    array($this->_rpc->xmlrpcArray)
                )
            )
        );
        $rpc->xmlRPCServer($methods);
    }

    public function action_gettask()
    {
        $model  = new Model_Screenshorts();
        $model->demon_task();

    }

} // End Welcome
