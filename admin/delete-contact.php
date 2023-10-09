<?php
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once  ("../lib/pdo.php");
require_once  ("../lib/form-contact.php");
require_once  ("../admin/template-admin/header-admin.php");

$contact = false;
$errors = [];
$messages = [];

    //selection contact avec id
if(isset($_GET["id"])){
    $contact = getContactByID($pdo, (int)$_GET["id"]);
}
if($contact){
    if(deleteContact($pdo, (int)$_GET["id"])){
        $messages[] = "Le contact a bien été supprimé, redirection dans <span class='couldown'></span> s...";
    }else{
        $errors[] = "Une erreur s'est produite, redirection dans <span class='couldown'></span> s...";
    }
}else{
    $errors[] = "Le contact n'existe pas, redirection dans <span class='couldown'></span> s...";
}
?>

<?php require_once ("template-admin/delete-part.php") ?>


<script>setTimeout(() => {window.location.href="./contacts.php"}, 4000);</script>
<script src="../js/lib/couldown.js"></script>
<?php require_once ("template-admin/footer-admin.php") ?>