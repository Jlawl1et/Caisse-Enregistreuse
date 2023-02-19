<?php

class Controller_accueil extends Controller {

    public function action_membre(){
        $data = [];
        $this->render("accueil_membre", $data);
    }

    public function action_client(){
        $data = [];
        $this->render("accueil_client", $data);
    }

    public function action_default() {
        $data = ["message"=>""];
        if (isset($_SESSION['role'])) {
            if ( $_SESSION['role'] == "administrateur" OR $_SESSION['role'] == "super-administrateur") {
                $this->action_membre();
            } else {
                $this->action_client();
            }
        } else {
            $this->render("login", $data);
        }
    }
}