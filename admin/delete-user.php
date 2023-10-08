<?php
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once  ("../lib/pdo.php");
require_once  ("../lib/user.php");
require_once  ("../admin/template-admin/header-admin.php");

$user = false;
$errors = [];
$messages = [];

    //selection user avec id
if(isset($_GET["id"])){
    $user = getUserById($pdo, (int)$_GET["id"]);
}
if($user){
    if(deleteUser($pdo, (int)$_GET["id"])){
        $messages[] = "L'utilisateur a bien été supprimé, redirection dans <span class='couldown'></span> s...";
    }else{
        $errors[] = "Une erreur s'est produite, redirection dans <span class='couldown'></span> s...";
    }
}else{
    $errors[] = "L'utilisateur n'existe pas, redirection dans <span class='couldown'></span> s...";
}
?>

<?php require_once ("template-admin/delete-part.php") ?>

<script>setTimeout(() => {window.location.href="./add-user.php"}, 4000);</script>
<script src="../js/lib/couldown.js"></script>
<?php require_once ("template-admin/footer-admin.php") ?>