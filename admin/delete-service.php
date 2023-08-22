<?php
    require_once ("../lib/session.php");
    require_once  ("../lib/config.php");
    require_once  ("../lib/pdo.php");
    require_once  ("../lib/services.php");
    require_once  ("../admin/template-admin/header-admin.php");

    $serviceArticle = false;
    $errors = [];
    $messages = [];

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

<!-- <div class="line-style"></div> -->
<?php 
    foreach ($messages as $message) { ?>
        <div class="alert alert-sucess" role="alert"><?php $message; ?></div>
<?php }?>
<?php 
    foreach ($errors as $error) { ?>
        <div class="alert alert-danger" role="alert"><?php $error; ?></div>
<?php }?>
<div class="line-style"></div>