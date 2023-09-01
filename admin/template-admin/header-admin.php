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
            <aside class="section-admin__nav">
                <div class="section-admin__nav__header">
                    <img src="../assets/logo_VP.png" alt="Logo garage" class="witdh-logo">
                    <p>Espace Administrateur</p>
                </div>

                <div class="line-inside-div-style"></div>

                <div class="section-admin__liste">
                    <ul>
                        <?php if ($_SESSION["user"]["role"] === "admin")  {?>
                            <li><a href="../admin/index-admin.php">Accueil Administrateur</a></li>
                            <li><a href="../admin/add-car.php">Articles</a></li>
                            <li><a href="../admin/add-hourly.php">Horaires</a></li>
                            <li><a href="../admin/add-service.php">Services</a></li>
                            <li><a href="../admin/moderation-opinion.php">Modération avis clients</a></li>
                            <li><a href="../admin/contacts.php">Contacts</a></li>
                            <li><a href="../admin/add-user.php">Création de compte pro</a></li>
                        <?php }elseif ($_SESSION["user"]["role"] === "employe"){?>
                            <li><a href="../admin/index-admin.php">Accueil Administrateur</a></li>
                            <li><a href="../admin/add-car.php">Articles</a></li>
                            <li><a href="../admin/moderation-opinion.php">Modération avis clients</a></li>
                            <li><a href="../admin/contacts.php">Contacts</a></li>
                        <?php };?>
                    </ul>
                </div>

                <div class="line-inside-div-style"></div>

                <div class="section-admin__footer">
                    <img src="../assets/logo_VP.png" alt="#" class="witdh-logo">
                    <p> <?= $_SESSION["user"]["lastname"]." ".$_SESSION["user"]["firstname"]?> </p>
                    <div class="">
                        <button type="button" class="dropdown-toggle dropdown-toggle-split button-group-admin" data-bs-toggle="dropdown">
                        </button>
                        <ul class="dropdown-menu button-group-admin__menu">
                            <li><a href="../index.php">Retour à l'accueil</a></li>
                            <li><a href="../deconnection.php">Déconnection</a></li>
                        </ul>
                    </div>
                </div>
    </aside>