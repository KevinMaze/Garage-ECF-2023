<?php
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once  ("../lib/pdo.php");
require_once  ("../lib/car.php");
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
}
if($carArticle){
    if(deleteCar($pdo, (int)$_GET["id"])){
        $messages[] = "L'article a bien été supprimé, redirection dans <span class='couldown'></span> s...";
    }else{
        $errors[] = "Une erreur s'est produite, redirection dans <span class='couldown'></span> s...";
    };
}else{
    $errors[] = "L'article n'existe pas, redirection dans <span class='couldown'></span> s...";
}
?>

<?php require_once ("template-admin/delete-part.php") ?>


<script>setTimeout(() => {window.location.href="./add-car.php"}, 4000);</script>
<script src="../js/lib/couldown.js"></script>
<?php require_once ("template-admin/footer-admin.php") ?>