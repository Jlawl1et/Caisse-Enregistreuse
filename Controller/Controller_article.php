<?php
class Controller_article extends Controller{

    public function action_snack(){
        $m = Model::getModel();
        $data = $m->getSnack();
        $this->render("commande", $data);
    }

    public function action_boisson(){
        $m = Model::getModel();
        $data = $m->getBoisson();
        $this->render("commande", $data);
    }

    public function action_soda(){
        $m = Model::getModel();
        $data = $m->getSoda();
        $this->render("commande", $data);
    }

    public function action_default(){
        $this->action_snack();
    }
     
}

?>