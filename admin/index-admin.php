<?php  
    require_once ('../lib/config.php');
    require_once ('../lib/session.php');
    require_once ('../lib/user.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/lib/nav.css">
    <link rel="stylesheet" href="../css/lib/button.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:wght@100;200;300;400;500;600;700;800;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/logo_VP.png" type="image/png">
    <title>Espace Administrateur</title>
</head>
    <body>

        <div class="button-up"><img src="../assets/arrowup.png" alt="flèche haut"></div>

        <section class="section-admin">
            <?php require_once("../admin/template-admin/aside-admin.php") ?>




            <aside class="section-admin__crud">
                <div class="section-admin__crud__title">
                    <h2 class="title-h2"  id="articles">Articles</h2>
                    <div class="custom-button"><a href="">Ajouter un article</a></div>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__description">
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1 - Clio Estate TCE 90 LIMITED | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__title">
                    <h2 class="title-h2"  id="horaires">Horaires</h2>
                    <div class="custom-button"><a href="#">Ajouter une horaire</a></div>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__description">
                    <p>LUN : | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>MAR : | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>MER : | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>JEU : | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>VEN : | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>SAM : | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>DIM : | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                </div>


                <div class="line-style"></div>

                <div class="section-admin__crud__title"  id="services">
                    <h2 class="title-h2">Services</h2>
                    <div class="custom-button"><a href="#">Ajouter un service</a></div>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__description">
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- Services 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__title"  id="moderation">
                    <h2 class="title-h2">Modération avis</h2>
                    <div class="custom-button"><a href="#">Ajouter un avis</a></div>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__description">
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                    <p>1- avis 1 | <a href="#">Modifier</a> | <a href="#">Supprimer</a></p>
                </div>

                <div class="copyright">
                    &#169;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    &#160;VP Garage.
                </div>

            </aside>

        </section>






        <script src="../js/script.js"></script>
        <script src="../js/lib/nav.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script>AOS.init();</script>
    </body>
</html>