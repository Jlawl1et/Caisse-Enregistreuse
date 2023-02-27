<?php

class Controller_commande extends Controller{

        public function action_commande(){
            $m = Model::getModel();
            $data = $m->getArticle();
            $this->render("commande",$data);
        }

        public function action_ajouter_panier(){
            $data = [];
            if (isset($_GET['article'])) {
                $m = Model::getModel();
                // récupération de l'article à ajouter dans le panier
                $article = $m->getInformationArticle($_GET['article']);
                // Création de l'array() "panier" s'il n'y en a déjà pas
                if (!isset($_SESSION['panier'])) {
                    $_SESSION['panier'] = array();
                }

                $articleDansPanier = false;
                $nbArticle = (int)$m->nbArticle()['COUNT(*)'];
                for ($i=0;$i<$nbArticle;$i++) {
                    if (isset($_SESSION['panier'][$i])) {
                        if ( $_SESSION['panier'][$i]['id_article'] == $article['id_article'] ) {
                            $articleDansPanier = true;
                            if ($article['nb_article']-$_SESSION['panier'][$i]['quantite'] < 1) {
                                break 1;
                            }
                            $_SESSION['panier'][$i]['quantite'] += 1;
                            $_SESSION['panier'][$i]['prix'] += $article['prix'];
                            break 1;
                        }
                    }
                }

                if (!$articleDansPanier) {
                    // Si l'article n'est pas encore dans le panier, le rajouter dans le panier
                    array_push($_SESSION['panier'],$article);
                    // Ajout de la quantité
                    $_SESSION['panier'][sizeof($_SESSION['panier']) - 1]['quantite'] = 1;
                }

                $this->action_default();

            } else {
                $this->action_default();
            }

        }

        public function action_retirer_panier(){

            if (isset($_GET['article'])) {
                $m = Model::getModel();
                // récupération de l'article à retirer dans le panier
                $article = $m->getInformationArticle($_GET['article']);
                $nbArticle = (int)$m->nbArticle()['COUNT(*)'];
                for ($i=0;$i<$nbArticle;$i++) {

                    if (isset($_SESSION['panier'][$i])) {

                        if ($_SESSION['panier'][$i]['id_article'] == $_GET['article']) {

                            $_SESSION['panier'][$i]['quantite'] -= 1;
                            $_SESSION['panier'][$i]['prix'] -= $article['prix'];

                            if ($_SESSION['panier'][$i]['quantite'] < 1) {
                                unset($_SESSION['panier'][$i]);
                            }
                            break 1;
                        }
                    }
                }
            }
            $this->action_default();

        }

        public function action_annulation(){
            unset($_SESSION['panier']);
            $this->action_default();
        }
        public function action_validation(){
            $m = Model::getModel();
            foreach ($_SESSION['panier'] as $val) {
                if (isset($_POST['id_utilisateur'])) {
                    $val['id_utilisateur'] = (int)$_POST['id_utilisateur'];
                } else {
                    $val['id_utilisateur'] = NULL;
                }
                $val['moyen_paiement'] = $_POST['moyen_paiement'];
                $m->commande($val);
            }
            unset($_SESSION['panier']);
            $data['message'] = 'L\'achat a été effectué avec succès';
            $this->render("message", $data);

        }
        public function action_default(){
            $this->action_commande();
        }
}
?>