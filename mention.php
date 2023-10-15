<?php
require_once ('lib/config.php');
require_once ('lib/session.php');
require_once ('lib/pdo.php');
require_once ('lib/hourly.php');
require_once ('lib/main_menu.php');
$hourlys = getHourly($pdo);
$currentPage = basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/lib/nav.css">
    <link rel="stylesheet" href="./css/lib/button.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:wght@100;200;300;400;500;600;700;800;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/logo_VP.png" type="image/png">
    <title><?=$mainMenu[$currentPage]["head_title"]?></title>
</head>
    <body>

        <nav>
            <aside id="sidebar">
                <div class="sidebar_content sidebar_head">
                    <h1 class="sidebar__title">VP Garage</h1>
                </div>

                <div class="line"></div>

                <div class="sidebar_content sidebar_body">
                    <nav class="side_navlinks">
                        <ul>
                            <?php foreach ($mainMenu as $key => $menuItem) {
                                if($menuItem["exclude"] == false){
                                ?>
                                <li><a href=<?= $key ?>><?= $menuItem["title"] ?></a></li>
                            <?php }
                            } 
                            ?> 
                            <a href="connection.php" class="custom-button">Connection</a>

                        </ul>

                    </nav>
                </div>

                <div class="line"></div>

                <div class="sidebar_content sidebar_foot">
                    <p>
                    &#169;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        &#160;VP Garage.
                    </p>
                </div>
            </aside>


            <div class="sidebar_toggler">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

        <section class="form-style-connection flux">

            <h1 class="title-h2">Mentions Légales</h1>

            <div class="line-style flux"></div>

            <p class="label-connection">
                Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour la Confiance dans l’économie numérique, dite L.C.E.N., il est porté à la connaissance des utilisateurs et visiteurs, ci-après l"Utilisateur", du site https://ecf-garage-2023-3c29043c899b.herokuapp.com/ , ci-après le "Site", les présentes mentions légales.
                La connexion et la navigation sur le Site par l’Utilisateur implique acceptation intégrale et sans réserve des présentes mentions légales.
                Ces dernières sont accessibles sur le Site à la rubrique « Mentions légales ».
            </p>

            <h2 class="title-h2">ARTICLE 1 - L'EDITEUR</h2>

            <div class="line-style flux"></div>

            <p class="label-connection">
                L’édition et la direction de la publication du Site est assurée par Kévin Mazé, domiciliée _______________, dont le numéro de téléphone est _______________, et l'adresse e-mail _______________.
                ci-après l'"Editeur".
            </p>

            <h2 class="title-h2">ARTICLE 2 - L'HEBERGEUR</h2>

            <div class="line-style flux"></div>

            <p class="label-connection">
                L'hébergeur du Site est la société heroku, dont le siège social est situé au _______________ , avec le numéro de téléphone : _______________ + adresse mail de contact.
            </p>

            <h2 class="title-h2">ARTICLE 3 - ACCES AU SITE</h2>

            <div class="line-style flux"></div>

            <p class="label-connection">
                Le Site est accessible en tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption programmée ou non et pouvant découlant d’une nécessité de maintenance.
                En cas de modification, interruption ou suspension du Site, l'Editeur ne saurait être tenu responsable.

            </p>

            <h2 class="title-h2">ARTICLE 4 - COLLECTE DES DONNEES</h2>

            <div class="line-style flux"></div>

            <p class="label-connection">
                Le Site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés. 

                En vertu de la loi Informatique et Libertés, en date du 6 janvier 1978, l'Utilisateur dispose d'un droit d'accès, de rectification, de suppression et d'opposition de ses données personnelles. L'Utilisateur exerce ce droit :
                ·         via un formulaire de contact ;
                
                ·         via son espace personnel ;
                
                Toute utilisation, reproduction, diffusion, commercialisation, modification de toute ou partie du Site, sans autorisation de l’Editeur est prohibée et pourra entraînée des actions et poursuites judiciaires telles que notamment prévues par le Code de la propriété intellectuelle et le Code civil.

                Rédigé sur http://legalplace.fr

            </p>

            <div class="line-style flux"></div>
        </section>
<?php require_once ('template/footer.php'); ?>