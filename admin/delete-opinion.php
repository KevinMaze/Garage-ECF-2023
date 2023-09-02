<?php
    require_once ("../lib/session.php");
    require_once  ("../lib/config.php");
    require_once  ("../lib/pdo.php");
    require_once  ("../lib/opinion.php");
    require_once  ("../admin/template-admin/header-admin.php");

    $opinion = false;
    $errors = [];
    $messages = [];

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
?>

<?php require_once ("template-admin/delete-part.php") ?>

<?php require_once ("template-admin/footer-admin.php") ?>