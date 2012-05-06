<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Panel_Sites extends Controller_Core {

    public function action_index()
    {

    }

    public function action_new()
    {
        if ( $this->is_ajax())
            return $this->render_partial('panel/sites/form', array('errors' => array()));

    }

    public function action_update()
    {
        $id = Arr::get($_REQUEST, 'site_id');

        if ( ! $id)
        {
            $model =  new Model_Sites();
        }
        else {
            $model = Model_Sites::find($id);
        }
        $model->update_params(array(
            'title' => Arr::get($_REQUEST, 'url_title'),
            'link' => Arr::get($_REQUEST, 'url'),
            'category' => Arr::get($_REQUEST, 'parent_cat'),
            'user_id' => Auth::instance()->current_user()->id,
        ));
        if ( ! $model->add_site())
        {
            $this->render_partial('panel/sites/form', array('errors' => $model->errors()));
            return;
        }
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