-	Télécharger les données du site en local via github, cliquer sur code et « download zip »
https://github.com/KevinMaze/Garage-ECF-2023
-   Ou faire un clone du projet depuis le dépôt git, dans l'invité de commande ou le terminal de VSCode "git clone https://github.com/KevinMaze/Garage-ECF-2023.git"
-	Mettre le dossier dans www de WampServer
-	Clique gauche sur l’icone de Wampserver et aller dans localhost
-	Choisir dans « Vos Projets » le dossier correspondant au site Garage-ECF-2023.

-   Clique gauche sur l'icone wampserver, et choisir phpmyadmin, utiliser l'identifiant root sans mdp, aller dans bases de données et créer une database, utiliser le fichier .sql présent dans la racine du projet Garage-ECF_2023 pour créer les tables necessaire
-   Dans le dossier lib, choisir le fichier pdo.php et changer les commentaire (voir commentaire)

-   Pour créer un compte amdin (une fois les tables créés) pour le back office utiliser le code suivant dans la partie sql de phpmyadmin (attention aux majuscules et mininuscule utiliser sont pris en compte)

INSERT INTO user (lastname, firstname, email, password, role) VALUE ('VOTRE NOM', 'VOTRE PRENOM', 'VOTRE EMAIL', 'VOTRE MOT DE PASSE', 'admin ou employe') 

