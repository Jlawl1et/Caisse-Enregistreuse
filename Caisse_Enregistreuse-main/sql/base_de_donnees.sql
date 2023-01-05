DROP TABLE IF EXISTS "utilisateur" CASCADE;
DROP TABLE IF EXISTS "historique_commande_guest" CASCADE;
DROP TABLE IF EXISTS "historique_commande_util" CASCADE;
DROP TABLE IF EXISTS "stock" CASCADE;
DROP TABLE IF EXISTS "article" CASCADE;
DROP TABLE IF EXISTS "test" CASCADE;


CREATE TABLE "utilisateur" (
  "id_utilisateur" int,
  "nom" varchar,
  "prenom" varchar,
  "mail" varchar,
  "mdp" varchar,
  "role" varchar,
  "date_creation" date,
  "date_connexion" date,
PRIMARY KEY (id_utilisateur)
);

CREATE TABLE "historique_commande_guest" (
  "id_article" int,
  "nom_article" varchar,
  "date_achat" date,
  "moyen_payement" varchar
);

CREATE TABLE "historique_commande_util" (
  "id_article" int,
  "id_utilisateur" int,
  "nom_article" varchar,
  "date_achat" date,
  "moyen_payement" varchar
);

CREATE TABLE "stock" (
  "id_article" int,
  "nb_article" int
);

CREATE TABLE "article" (
  "id_article" int,
  "nom_article" varchar,
  "prix" float,
  "categorie" varchar,
  "informations" varchar,
  PRIMARY KEY (id_article)
);

CREATE TABLE "test" (
  "id" int,
  "tests" varchar
);

ALTER TABLE "historique_commande_util" ADD FOREIGN KEY ("id_utilisateur") REFERENCES "utilisateur" ("id_utilisateur");

ALTER TABLE "historique_commande_guest" ADD FOREIGN KEY ("id_article") REFERENCES "article" ("id_article");

ALTER TABLE "historique_commande_util" ADD FOREIGN KEY ("id_article") REFERENCES "article" ("id_article");

ALTER TABLE "stock" ADD FOREIGN KEY ("id_article") REFERENCES "article" ("id_article");
