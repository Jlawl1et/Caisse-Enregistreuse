DROP TABLE IF EXISTS utilisateur CASCADE;
DROP TABLE IF EXISTS historique_commande_util CASCADE;
DROP TABLE IF EXISTS article CASCADE;

CREATE TABLE utilisateur(
    "id_utilisateur" INTEGER NOT NULL ,
    "nom" VARCHAR(55) NULL,
    "prenom" VARCHAR(55) NULL,
    "mail" VARCHAR(55) NULL,
    "mdp" VARCHAR(55) NULL,
    "role" VARCHAR(55) NULL,
    "date_creation" date,
    "date_connexion" TIMESTAMP,
    "point_fid" INTEGER NOT NULL DEFAULT 5
);

ALTER TABLE
    "utilisateur" ADD PRIMARY KEY("id_utilisateur");


CREATE TABLE "historique_commande_util"(
    "id_article" INTEGER NULL,
    "id_utilisateur" INTEGER NULL,
    "nom_article" VARCHAR(55) NULL,
    "date_achat" date,
    "heure_achat" time,
    "moyen_paiement" VARCHAR(55) NULL
);


CREATE TABLE "article"(
    "id_article" INTEGER NOT NULL,
    "nom_article" VARCHAR(50) NULL,
    "prix" DOUBLE PRECISION NULL,
    "categorie" VARCHAR(50) NULL,
    "informations" VARCHAR(50) NULL,
    "nb_article" INTEGER NULL,
    "image" VARCHAR(100)
);

ALTER TABLE
    "article" ADD PRIMARY KEY("id_article");

ALTER TABLE
    "historique_commande_guest" ADD CONSTRAINT "historique_commande_guest_id_article_foreign" FOREIGN KEY("id_article") REFERENCES "article"("id_article");
