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
    $errors = [];
    $messages = [];

    // selection car avec id
    if(isset($_GET["id"])){
        $carArticle = getCarById($pdo, (int)$_GET["id"]);
        if($carArticle){
            if(deleteCar($pdo, $_GET["id"])){
                $messages[] = "L'article a bien été supprimé";
            }else{
                $errors[] = "Une erreur s'est produite !";
            };
        }else{
            $errors[] = "L'article n'existe pas !";
        }
    }
?>

<?php require_once ("template-admin/delete-part.php") ?>

<?php require_once ("template-admin/footer-admin.php") ?>