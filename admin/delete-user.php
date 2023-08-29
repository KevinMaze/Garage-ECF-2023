<?php
    require_once ("../lib/session.php");
    require_once  ("../lib/config.php");
    require_once  ("../lib/pdo.php");
    require_once  ("../lib/user.php");
    require_once  ("../admin/template-admin/header-admin.php");

    $user = false;

    $errors = [];
    $messages = [];

    if(isset($_GET["id"])){
        $user = getUserById($pdo, $_GET["id"]);
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
?>

<section class="flux">

    <div class="line-style"></div>

    <h2 class="title-h2">Suppression de l'utilisateur</h2>
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