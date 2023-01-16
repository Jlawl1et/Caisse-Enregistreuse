<?php

class Controller_historique extends Controller{

    public function action_client(){
            $m = Model::getModel();
            $data = $m->consulterHistorique($_GET["id"]);
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
    /* à faire */
    }
}
?>