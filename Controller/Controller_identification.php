<?php
require_once "Model/Model.php";
class Controller_identification extends Controller{

    public function action_login(){

        $m = Model::getModel();
        $data = [];

        if (isset($_POST['submit'])) {

            if ($_POST["id_utilisateur"] != "" && $_POST["mdp"] != "") {
                $liste = $m->getIdentifiantsLogin();

                if( in_array($_POST['id_utilisateur'] ,array_keys($liste) ) ) {
                    $utilisateur = $m->getInformationCompte($_POST['id_utilisateur']);

                    if ( $utilisateur['mdp'] == md5($_POST['mdp']) ) {
                    // Remplissage de la session
                        $_SESSION["connecte"] = true;
                        $_SESSION['id_utilisateur'] = $utilisateur["id_utilisateur"];
                        $_SESSION["nom"] = $utilisateur["nom"];
                        $_SESSION["prenom"] = $utilisateur["prenom"];
                        $_SESSION["mail"] = $utilisateur["mail"];
                        $_SESSION["role"] = $utilisateur["role"];
                        $_SESSION["date_creation"] = $utilisateur["date_creation"];
                        $_SESSION["date_connexion"] = $m->dateConnexion($_SESSION["id_utilisateur"]);
                        $_SESSION["point_fid"] = $utilisateur["point_fid"];
                    //Rôles
                        if ( $_SESSION['role'] == "administrateur" or $_SESSION['role'] == "super-administrateur") {
                            $this->render("accueil_membre",$data);
                        } else {
                            $this->render("accueil_client", $data);
                        }

                    } else {
                        $data = ["message"=>"Le mot de passe est incorrect"];
                        $this->render("login", $data);
                    }
                } else {
                    $data = ["message"=>"Le compte n'existe pas"];
                    $this->render("login", $data);
                }

            } else {
                $data = ["message"=>"Veuillez renseigner les champs"];
                $this->render("login",$data);

            }

        } else {
            $data = ["message"=>""];
            $this->render("login", $data);
        }

    }

    public function action_signin(){

        $m = Model::getModel();

        if ( isset($_POST['submit']) ){

            if ( $_POST['id_utilisateur'] != "" && $_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['mail'] != "" && $_POST['mdp'] != "" ){
                $liste = $m->getListeIdentifiants();

                foreach ($liste as $value){
                    if ($value["id_utilisateur"] == $_POST['id_utilisateur']){
                        $data = ["message"=>"L'identifiant possède déjà un compte"];
                        $this->render("signin", $data);
                    }
                }

                $infos = [];
                $attributs = ['id_utilisateur','nom','prenom','mail'];
                foreach ($attributs as $val){
                    $infos[$val] = $_POST[$val];
                }
                $infos['mdp'] = md5($_POST['mdp']);
                $m->inscription($infos);
                $data = ["message"=>"Votre compte a bien été crée, vous pouvez vous connecter"];
                $this->render("login", $data);

            } else {
                $data = ["message"=>"Veuillez remplir tous les champs du formulaire"];
                $this->render("signin", $data);
            }

        } else {
            $data = ["message"=>""];
            $this->render("signin", $data);
        }

    }



    public function action_logout(){
        session_destroy();
        $data = ["message"=>""];
        $this->render("login", $data);
    }

    public function action_default()
    {
        $this->action_login();
    }



} ?>