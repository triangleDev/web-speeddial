<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Demon extends Controller {

    public function action_index()
    {
        $rpc = RPC::factory();
        $methods = array(
            "speeddial.gettask" => array(
                "function" => array($this,'gettask'),
                "signature" => array(
                    array($rpc->xmlrpcArray)
                )
            )
        );
        $rpc->xmlRPCServer($methods);
    }

    public function gettask()
    {
        $model  = new Model_Screenshorts();
        $result = array();
        foreach( $model->demon_task() as $item)
        {
           $data = array();
           foreach( $item as $key => $val)
           {
               $type = 'string';
               if (is_numeric($val))
                    $type = 'int';
               $data[$key] = new xmlrpcval($item['id'],$type);
           }
           $result[] =  new xmlrpcval($data,'struct');
        }
        return new xmlrpcresp(new xmlrpcval($result, 'array'));

    }

} // End Welcome
