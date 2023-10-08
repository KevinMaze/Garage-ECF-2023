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
    if(deleteService($pdo, (int)$_GET["id"])){
        $messages[] = "L'article a bien été supprimé, redirection dans <span class='couldown'></span> s...";
    }else{
        $errors[] = "Une erreur s'est produite, redirection dans <span class='couldown'></span> s...";
    }
}else{
    $errors[] = "L'article n'existe pas, redirection dans <span class='couldown'></span> s...";
}
?>

<?php require_once ("template-admin/delete-part.php") ?>

<script>setTimeout(() => {window.location.href="./add-service.php"}, 4000);</script>
<script src="../js/lib/couldown.js"></script>
<?php require_once ("template-admin/footer-admin.php") ?>