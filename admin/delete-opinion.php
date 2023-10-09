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
    if(deleteOpinion($pdo, (int)$_GET["id"])){
        $messages[] = "L'avis a bien été supprimé, redirection dans <span class='couldown'></span> s...";
    }else{
        $errors[] = "Une erreur s'est produite, redirection dans <span class='couldown'></span> s...";
    }
}else{
    $errors[] = "L'avis n'existe pas, redirection dans <span class='couldown'></span> s...";
}
?>

<?php require_once ("template-admin/delete-part.php") ?>

<script>setTimeout(() => {window.location.href="./moderation-opinion.php"}, 4000);</script>
<script src="../js/lib/couldown.js"></script>
<?php require_once ("template-admin/footer-admin.php") ?>