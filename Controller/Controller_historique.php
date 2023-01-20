<?php

class Controller_historique extends Controller{

    public function action_client(){
        $m = Model::getModel();
        $data = $m->consulterHistorique(/* $_SESSION['id'] */);
        $this->render("historique_client", $data);
    }

    public function action_ventes(){
        $m = Model::getModel();
        $data = $m->consulterHistoriqueVentes();
        $this->render("bilan", $data);
    }

    public function action_bilan()
    {
        $m = Model::getModel();
        $data = $m->consulterBilan();
        $this->render("bilan", $data);
    }

    public function action_default(){
        $this->action_bilan();
        /* 
        $m = Model::getModel();
        if ($m->getRole($_SESSION['id']) = "administrateur" ){
            $this->action_ventes();
        } else {
            $this->action_client();
        }

        Je sais pas si ça marchera comme ça tu pourras regarder stp

        */
    }
}

?>