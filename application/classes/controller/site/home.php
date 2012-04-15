<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Site_Home extends Controller_Core {

	public function action_index()
	{
		$this->response->body('hello, world!');
	}

} // End Welcome
