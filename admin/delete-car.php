<?php
    require_once ("../lib/session.php");
    require_once  ("../lib/config.php");
    require_once  ("../lib/pdo.php");
    require_once  ("../lib/car.php");
    require_once  ("../admin/template-admin/header-admin.php");

    $imageCar = false;
    $carArticle = false;
    $errors = [];
    $messages = [];

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
?>

<section class="flux">

    <div class="line-style"></div>

    <h2 class="title-h2">Suppression de l'article</h2>
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