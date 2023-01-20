<?php
require_once "Model/Model.php";
class Controller_identification extends Controller{

    public function action_login()
    {
        $m = Model::getModel();
        $data = [];
        if (isset($_POST['identifiant']) && isset($_POST['mdp'])){
            $mdp = $m->getMotDePasse($_POST["identifiant"]);
            $identifiant = $_POST["identifiant"];
            if(password_verify($_POST["mdp"], $mdp)){
                $_SESSION["connecte"]= true;
                $_SESSION["identifiant"] = $identifiant;
                $_SESSION["nom"]=$m->getNom($identifiant);
                $_SESSION["prenom"]=$m->getPrenom($identifiant);
                $_SESSION["mail"]=$m->getMail($identifiant);
                $_SESSION["role"]=$m->getRole($identifiant);
                $_SESSION["date_creation"] = $m->getDateCreation($identifiant);
                $_SESSION["date_connexion"] = $m->getDateConnexion($identifiant);
                $_SESSION["points"] = $m->getPointsFid($identifiant);
                if($m->getRole($identifiant) == 'utilisateur'){
                    $this->render("accueil_client", $data);
                }elseif($m->getRole($identifiant) == 'administrateur'){
                    $this->render("accueil_membre", $data);
                }else{
                    $_SESSION["Message"] = "Vous ne possedez pas de role, veuillez vous presenter au BDE pour contacter un administrateur";
                }
            }
        }
        elseif (isset($_SESSION["connecte"]) && $_SESSION["connecte"]){
            $identifiant = $_SESSION["identifiant"];
            if($m->getRole($identifiant) == 'utilisateur'){
                $this->render("accueil_client", $data);
            }elseif($m->getRole($identifiant) == 'administrateur') {
                $this->render("accueil_membre", $data);
            }
        }
        else {
            $this->render("login", $data);
        }
    }

    public function action_signin(){
        $m = Model::getModel();
        $data = [];
        if (isset($_POST["identifiant"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["mdp"])){
            $m->ajouterCompte($_POST["identifiant"], $_POST["nom"], $_POST["prenom"], $_POST["mail"], $_POST["mdp"]);
            $identifiant = $_POST["identifiant"];
            $_SESSION["connecte"]= true;
            $_SESSION["identifiant"] = $identifiant;
            $_SESSION["nom"]=$m->getNom($identifiant);
            $_SESSION["prenom"]=$m->getPrenom($identifiant);
            $_SESSION["mail"]=$m->getMail($identifiant);
            $_SESSION["role"]=$m->getRole($identifiant);
            $_SESSION["date_creation"] = $m->getDateCreation($identifiant);
            $_SESSION["date_connexion"] = $m->getDateConnexion($identifiant);
            $_SESSION["points"] = $m->getPointsFid($identifiant);
            //ajouter la date de création
            $this->render("accueil_client", $data);
        }
        elseif (isset($_SESSION["connecte"]) && $_SESSION["connecte"]){
            $this->render("accueil_client" , $data);
        }
        else {
            $this->render("signin", $data);
        }

        if( isset($_GET['logout']) && $_GET['logout'] == 1 ) {
            session_destroy();
        }
    }

    public function action_compte(){
        $this->render("mon_compte", $data=false);
    }

    public function action_default()
    {
        $this->action_login();
    }

} ?>