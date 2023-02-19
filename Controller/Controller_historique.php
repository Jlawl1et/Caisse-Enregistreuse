<?php

class Controller_historique extends Controller{

    public function action_client(){
        $m = Model::getModel();

        if (isset($_GET['tri'])) {
            $data = $m->historiqueClientFiltre($_GET['tri']);
        } else {
            $data = $m->consulterHistorique($_SESSION['id_utilisateur']);
        }

        $this->render("historique_client", $data);
    }

    public function action_ventes(){
        $m = Model::getModel();

        if (isset($_GET['tri'])) {
            $data = $m->historiqueFiltre($_GET['tri']);
        } else {
            $data = $m->consulterHistoriqueVentes();
        }

        $this->render("historique_ventes", $data);
    }

    public function action_bilan() {
        $m = Model::getModel();
        if (isset($_GET['tri'])) {
            $data = $m->bilanFiltre($_GET['tri']);
        } else {
            $data = $m->consulterBilan();
        }

        $this->render("bilan", $data);
    }

    public function action_default(){
        $this->action_bilan();
    }
}

?>