<?php

class Controller_historique extends Controller{

    public function action_client(){
        if (isset($_GET["id"])) {
            $m = Model::getModel();
            $data = $m->consulterHistorique($_GET["id"]);
            $this->render("historique_client", $data);
        } else {
            $this->action_error("Vous n'êtes pas connecté.\nVeuillez vous connecter pour accéder à votre historique");
        }
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
        $m = Model::getModel();
        if ($m->getRole($_GET["id"]) = "administrateur"){
            $this->action_bilan();
        } else {
            $this->action_client();
        }
    }
}
?>