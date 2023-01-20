<?php

class Controller_commande extends Controller{
    
        public function action_default(){
            $m = Model::getModel();
            $data = $m->getArticle();
            $this->render("commande", $data);
        }
}

?>