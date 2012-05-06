<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Panel_Categories extends Controller_Core {

    public function action_index()
    {

    }

    public function action_new()
    {
        if ( $this->is_ajax())
            return $this->render_partial('panel/categories/form', array('errors' => array()));

    }

    public function action_update()
    {
        $model = new Model_Categories(array(
            'name' => Arr::get($_REQUEST, 'cat_name'),
            'parent_id' => Arr::get($_REQUEST, 'parent_cat'),
            'user_id' => Auth::instance()->current_user()->id,
        ));
        if ( ! $model->add())
        {
            $this->render_partial('panel/categories/form', array('errors' => $model->errors()));
            return;
        }
        $this->render_nothing();
    }

    public function action_delete()
    {
        if ( $this->is_delete())
            throw new Kohana_HTTP_Exception_403();

        $id = $this->request->param('id');
        $model  = new Model_Categories();
        $model->delete($id);
    }
}