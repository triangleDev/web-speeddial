<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Demon extends Controller {

    public function action_index()
    {///echo phpinfo();exit;
        $rpc = RPC::factory();
        $methods = array(
            "speeddial.gettask" => array(
                "function" => array($this,'gettask'),
                "signature" => array(
                    array($rpc->xmlrpcArray)
                )
            ),
            "speeddial.saveImage" => array(
                "function" => array($this,'save_image'),
                "signature" => array(
                    array( $rpc->xmlrpcInt, $rpc->xmlrpcStruct)
                )
            ),
            "speeddial.brokenImage" => array(
                "function" => array($this,'broken_image'),
                "signature" => array(
                    array( $rpc->xmlrpcInt, $rpc->xmlrpcStruct)
                )
            )
        );
        $rpc->xmlRPCServer($methods);
    }

    public function broken_image($m)
    {
        $params = php_xmlrpc_decode($m);
        $params = $params[0];
        Model_Screenshorts::demon_failure($params['id']);
        return new xmlrpcresp(new xmlrpcval(1, 'int'));
    }

    public function save_image($m)
    {
        $params = php_xmlrpc_decode($m);
        $params = $params[0];
        $image = Arr::get($params, 'image');
        if ( ! $image)
        {
            return new xmlrpcresp(new xmlrpcval(0, 'int'));
        }
        $im = imagecreatefromstring(base64_decode($image));

        $image_file = DOCROOT .'screenshorts'.DIRECTORY_SEPARATOR . Arr::get($params, 'file');
        $ext = Arr::get($params,'ext');
        if ($ext == "png")
        {
            imagesavealpha($im, TRUE);
            imagepng($im,$image_file , 5, PNG_ALL_FILTERS);
        }
        if ($ext == "jpg")
        {
            imagejpeg($im,$image_file , 100);
        }
        Model_Screenshorts::demon_sucess(array(
            'id' => Arr::get($params, 'id'),
            'file' => Arr::get($params, 'file'),
        ));
        imagedestroy($im);
        return new xmlrpcresp(new xmlrpcval(1, 'int'));
    }

    public function gettask()
    {
       $result = array();
        foreach( Model_Screenshorts::demon_task() as $item)
        {
           $data = array();
           foreach( $item as $key => $val)
           {
               $type = 'string';//preg_match('/^\d+$/',$val
               if (is_numeric($val))
		  $type = 'int';
                    
               $data[$key] = new xmlrpcval($item[$key],$type);
           }
           $result[] =  new xmlrpcval($data,'struct');
        }
        return new xmlrpcresp(new xmlrpcval($result, 'array'));
    }

} // End Welcome
