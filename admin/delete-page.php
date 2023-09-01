<?php
    require_once ("../lib/session.php");
    require_once  ("../lib/config.php");
    require_once  ("../lib/pdo.php");
    require_once  ("../lib/car.php");
    require_once  ("../lib/opinion.php");
    require_once  ("../lib/services.php");
    require_once  ("../lib/user.php");
    require_once  ("../lib/form-contact.php");
    require_once  ("../admin/template-admin/header-admin.php");

    $imageCar = false;
    $carArticle = false;
    $opinion = false;
    $serviceArticle = false;
    $user = false;
    $errors = [];
    $messages = [];

    // selection car avec id
    if(isset($_GET["id"])){
        $carArticle = getCarById($pdo, (int)$_GET["id"]);
        if($carArticle){
            if(deleteImageCar($pdo, $_GET["id"])){
                if(deleteCar($pdo, $_GET["id"])){
                    $messages[] = "L'article a bien été supprimé";
                }else{
                    $errors[] = "Une erreur s'est produite !";
                }
            };
        }else{
            $errors[] = "L'article n'existe pas !";
        }
    }

    //selection opinion avec id
    if(isset($_GET["id"])){
        $opinion = getOpinionById($pdo, (int)$_GET["id"]);
    }
    if($opinion){
        if(deleteOpinion($pdo, $_GET["id"])){
            $messages[] = "L'avis a bien été supprimé";
        }else{
            $errors[] = "Une erreur s'est produite !";
        }
    }else{
        $errors[] = "L'avis n'existe pas !";
    }

    //selection service avec id
    if(isset($_GET["id"])){
        $serviceArticle = getServiceById($pdo, (int)$_GET["id"]);
    }
    if($serviceArticle){
        if(deleteService($pdo, $_GET["id"])){
            $messages[] = "L'article a bien été supprimé";
        }else{
            $errors[] = "Une erreur s'est produite !";
        }
    }else{
        $errors[] = "L'article n'existe pas !";
    }

    //selection user avec id
    if(isset($_GET["id"])){
        $user = getUserById($pdo, (int)$_GET["id"]);
        if($user){
            if(deleteUser($pdo, $_GET["id"])){
                $messages[] = "L'utilisateur a bien été supprimé";
            }else{
                $errors[] = "Une erreur s'est produite";
            }
        }else{
            $errors[] = "L'utilisateur n'existe pas";
        }
    }

    //selection contact avec id
    if(isset($_GET["id"])){
        $contact = getContactByID($pdo, (int)$_GET["id"]);
        if($contact){
            if(deleteContact($pdo, (int)$_GET["id"])){
                $messages[] = "Le formulaire contact a bien été supprimé";
            }else{
                $errors[] = "Une erreur s'est produite";
            }
        }else{
            $errors[] = "Le contact n'existe pas";
        }
    }
?>

<section class="flux">

    <div class="line-style"></div>

    <h2 class="title-h2">Page de suppression</h2>
    <?php foreach ($messages as $message) { ?>
        <div class="alert alert-success">
        <?= $message ?>
        </div>
    <?php }?>

    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-danger">
        <?= $error ?>
        </div>
    <?php }?>

    <div class="line-style"></div>

</section>

<?php require_once ("template-admin/footer-admin.php") ?>