<?php
class Controller_article extends Controller{

    public function action_stock(){
        $m = Model::getModel();
        $data = $m->consulterInventaire();
        $this->render("stock", $data);
    }

    public function action_formulaire_modifier(){
        $m = Model::getModel();
        $infos = $m->getInformationArticle($_GET['id_article']);

        $data = [];
        foreach ($infos as $cle => $valeur){
            if($valeur === null){
                $data[$cle] = "";
            } else {
                $data[$cle] = $valeur;
            }
        }

        $this->render("modifier_article", $data);
    }

    public function action_modifier_article(){
        $m = Model::getModel();
        $infos = [];
        $noms = ['id_article','nom_article','prix','informations','categorie','nb_article'];
        foreach ($noms as $val){
            if (isset($_POST[$val])) {
                $infos[$val] = $_POST[$val];
            } else {
                $infos[$val] = "boisson";
            }
        }
        $m->updateArticle($infos);
        $message = "La modification a été effectuée avec succès";

        $data = ["message"=>$message];
        $this->render("message",$data);
    }

    public function action_formulaire_ajout(){
        $data = [];
        $this->render("ajout_article",$data);
    }

    public function action_ajouter_article(){
        $ajout = false;
        $m = Model::getModel();

        /*
        ------------------PARTIE AJOUT D'UNE IMAGE ASSOCIEE A UN ARTICLE (version brouillon sans verifs)
        */

        if (isset($_FILES['imageFile'])) {
            $image = $_FILES['imageFile']['name'];
            $extensionsValide = array('.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF');
            $extensionImage = strrchr($image, '.');
            $tmpName = $_FILES['imageFile']['tmp_name'];
            $imagePath = "Content/Images/" .$image;
            move_uploaded_file($_FILES['imageFile']['tmp_name'], $imagePath);
        } else {
            $imagePath = "Content/Images/no-image.png";
        }

        $infos = [];
        $noms = ['nom_article','prix','informations','categorie','nb_article'];
        foreach ($noms as $val){
            if (isset($_POST[$val])){
                $infos[$val] = $_POST[$val];
            } else {
                $infos[$val] = NULL;
            }
        }

        $id = $m->getNbArticle()+1;
        $infos['id_article'] = $id;
        $infos['image'] = $imagePath;

        $ajout = $m->ajouterArticle($infos);

        if ($ajout) {
            $data["message"] = "L'ajout a bien été effectué";
        } else {
            $data["message"] = "Nous n'avons pas pu ajouter votre article :(";
        }
        $this->render("message", $data);
    }

    public function action_default(){
        $this->action_stock();
    }
     
}

?>










