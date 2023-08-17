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