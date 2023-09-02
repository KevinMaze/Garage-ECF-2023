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

<?php require_once ("template-admin/delete-part.php") ?>

<?php require_once ("template-admin/footer-admin.php") ?>