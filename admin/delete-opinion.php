<?php
    require_once ("../lib/session.php");
    require_once  ("../lib/config.php");
    require_once  ("../lib/pdo.php");
    require_once  ("../lib/opinion.php");
    require_once  ("../admin/template-admin/header-admin.php");

    $opinion = false;
    $errors = [];
    $messages = [];

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

<section class="flux">
    <div class="line-style"></div>
    <h2 class="title-h2">Suppression de fichiers</h2>
    <?php 
        foreach ($messages as $message) { ?>
            <div class="alert alert-success" role="alert"><?= $message; ?></div>
    <?php }?>
    <?php 
        foreach ($errors as $error) { ?>
            <div class="alert alert-danger" role="alert"><?= $error; ?></div>
    <?php }?>
    <div class="line-style"></div>

</section>

<?php require_once ("template-admin/footer-admin.php") ?>