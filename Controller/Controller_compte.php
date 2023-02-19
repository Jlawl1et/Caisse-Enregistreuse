<?php

class Controller_compte extends Controller{

    public function action_compte() {
        $data = [];
        $this->render("compte", $data);
    }

    public function action_liste_compte(){
        $m = Model::getModel();
        $data = $m->getComptes();
        $this->render("liste_compte", $data);
    }

    public function action_formulaire_modifier(){
        $m = Model::getModel();
        $infos = $m->getInformationCompte($_GET['id_utilisateur']);

        $data = [];
        foreach ($infos as $cle => $valeur){
            if($valeur === null){
                $data[$cle] = "";
            } else {
                $data[$cle] = $valeur;
            }
        }

        $this->render("modifier_compte", $data);
    }

    public function action_modifier_compte(){
        $m = Model::getModel();
        $infos = [];
        $noms = ['id_utilisateur','nom','prenom','role'];
        foreach ($noms as $val){
            if (isset($_POST[$val])) {
                $infos[$val] = $_POST[$val];
            } else {
                $infos[$val] = "boisson";
            }
        }
        $m->updateCompte($infos);
        $message = "La modification a été effectuée avec succès";

        $data = ["message"=>$message];
        $this->render("message",$data);
    }

    public function action_default() {
        $this->action_compte();
    }
}