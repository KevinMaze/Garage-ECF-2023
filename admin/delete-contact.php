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
        if($contact){
            if(deleteContact($pdo, (int)$_GET["id"])){
                $messages[] = "Le formulaire contact a bien été supprimé";
            }else{
                $errors[] = "Une erreur s'est produite";
            }
        }else{
            $errors[] = "Le contact n'existe pas";
        }
    }
?>

<?php require_once ("template-admin/delete-part.php") ?>

<?php require_once ("template-admin/footer-admin.php") ?>