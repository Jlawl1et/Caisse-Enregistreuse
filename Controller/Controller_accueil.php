<?php

class Controller_accueil extends Controller {

    public function action_home(){
        $data = false;
        $this->render("accueil_client", $data);
    }

    public function action_membre(){
        $data = false;
        $this->render("accueil_membre", $data);
    }

    public function action_default()
    {
        $this->action_home();
    }
}