<?php
    require_once ("../lib/session.php");
    require_once  ("../lib/config.php");
    require_once  ("../lib/pdo.php");
    require_once  ("../lib/services.php");
    require_once  ("../admin/template-admin/header-admin.php");

    $serviceArticle = false;
    $errors = [];
    $messages = [];

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
?>

<?php require_once ("template-admin/delete-part.php") ?>

<?php require_once ("template-admin/footer-admin.php") ?>