<?php defined('SYSPATH') or die('No direct script access.');

class CoffeeScript
{
    public static function build_if_needed($name)
    {
        $js_name = DOCROOT.'media/js/'.$name.'.js';
        $cs_name = DOCROOT.'coffee_scripts/'.$name.'.coffee';
	
        if( ! file_exists($cs_name))
            return;
        if (file_exists($js_name) && filemtime($js_name) >= filemtime($cs_name))
            return;
        ///$command =
        $output = shell_exec('coffee -l -c '.$cs_name.' -o '.DOCROOT.'media/js/ 2>&1');
        if ( ! $output)
            return;

        throw new Kohana_Exception(
            __("coffescript_compiler_output_for :file : :output", array(
                ':file' => $js_name,
                ':output' => $output,
            ))
        );
    }
}
