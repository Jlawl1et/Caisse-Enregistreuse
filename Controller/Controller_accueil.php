<?php

class Controller_accueil extends Controller {

    public function action_home(){
        $data = [];
        $this->render("accueil_membre", $data);
    }

    public function action_membre(){
        $data = [];
        $this->render("accueil_membre", $data);
    }

    public function action_default()
    {
        $this->action_home();
    }
}