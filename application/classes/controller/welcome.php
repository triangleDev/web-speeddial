<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$this->response->body('hello, world!');
        Model_Sites::update_title_if_empty(2,'dsfdsfsd');
	}

} // End Welcome
