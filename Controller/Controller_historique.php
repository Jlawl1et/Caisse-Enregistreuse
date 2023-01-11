<?php

class Controller_historique extends Controller{

    public function action_historique()
    {
        $m = Model::getModel();
        $data= [
            "liste" => $m->getHistorique(),
        ];
        $this->render("historiqueclient", $data);
    }

    public function action_default()
    {
        $this->action_historique();
    }

}

?>