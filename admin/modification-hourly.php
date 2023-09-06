<?php  

require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/user.php");
require_once ("../lib/hourly.php");
require_once ('template-admin/header-admin.php');

$error = false;
$messages = [];
$errors = [];

// Récupération des données car pour modification (requête de récupération)
if(isset($_GET["id"])){
    $hourly = getHourlyById($pdo, (int)$_GET["id"]);
    if($hourly === false){
        $errors[] = "L'article demandé n\'existe pas !";
    }
    $pagetitle = "Formulaire de modification";
    if (!$hourly){
    $error = true;
    }
}else {
$error = true;
}


if(isset($_POST["add_hourly"])){
    $result = changeHourly($pdo, $_POST["name_day"], $_POST["hourly_am"], $_POST["hourly_pm"], $_GET["id"]);
    if($result) {
        $messages[] = "Enregistrement réussi";
    }else{
        $errors[] = "Problème survenu !";
    }
};
?>

<?php  if (!$error) {?>

    <section class="flux">
        <h2 class="title-h2">Horaires actuelles</h2>

        <div class="line-style"></div>

        <div class="section-admin__crud__description">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Matin</th>
                        <th scope="col">Après-midi</th>
                    </tr>
                </thead>

                <tbody>
                        <tr>
                        <th scope="row"><?= $hourly["hourly_id"] ?></th>
                            <td><?= $hourly["name_day"] ?></td>
                            <td><?= $hourly["hourly_am"] ?></td>
                            <td><?= $hourly["hourly_pm"] ?></td>
                        </tr>

                </tbody>
            </table>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <fieldset class="form-style">
                <?php 
                foreach ($messages as $message) { ?>
                    <div class="alert alert-success"><?= $message; ?></div>
                    <?php }?>
                <?php 
                foreach ($errors as $error) { ?>
                    <div class="alert alert-danger"><?= $error; ?></div>
                    <?php }?>
                <legend class="form-legend"><?= $pagetitle ?></legend>
            
                <label for="lundi"><input type="text" id="lundi" name="name_day" value="<?= $hourly["name_day"] ?>" class="form-input"></label>

                <label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" value="<?= $hourly["hourly_am"] ?>" class="form-input"></label>

                <label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" value="<?= $hourly["hourly_pm"] ?>" class="form-input"></label>

                <div class="form-button">
                    <input type="submit" value="Envoyer" name="add_hourly" class="custom-button">
                </div>

            </fieldset>
        </form>
    </section>

<?php }else {?>
    <h1 class="title-h2"><?= _ERROR_MESSAGE_ ?></h1>
<?php }?>

<?php require_once ("template-admin/footer-admin.php") ?>