<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Panel_Sites extends Controller_Core {

    public function action_index()
    {

    }

    public function action_new()
    {
        if ( $this->is_ajax())
            return $this->render_partial('panel/sites/form');

    }

    public function action_update()
    {
	$this->render_nothing();
    }

    public function action_delete()
    {
        if ( $this->is_delete())
            throw new Kohana_HTTP_Exception_403();

        $id = $this->request->param('id');
        $model  = new Model_Sites();
        $model->delete($id);
    }
}