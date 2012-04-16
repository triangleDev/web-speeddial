<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Site_Home extends Controller_Core {

    public function action_index() {
        
    }

    public function action_add_site() {
        $data = $this->request->post();
        $site = ORM::factory('site');
        foreach ($data as $key => $value) {
            $site->$key = $value;
        }
        echo $this->render_json(json_encode($site->save()));
    }

}

// End Welcome
