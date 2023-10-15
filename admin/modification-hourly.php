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

// Récupération des données horaires pour modification (requête de récupération)
try {
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
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    if(isset($_POST["add_hourly"])){
        $result = changeHourly($pdo, htmlspecialchars($_POST["name_day"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["hourly_am"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["hourly_pm"], ENT_IGNORE, 'UTF-8'), $_GET["id"]);
        if($result) {
            $messages[] = "Enregistrement réussi";
        }else{
            $errors[] = "Problème survenu !";
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
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
                        <th scope="row"><?= htmlentities($hourly["hourly_id"]) ?></th>
                            <td><?= htmlentities($hourly["name_day"]) ?></td>
                            <td><?= htmlentities($hourly["hourly_am"]) ?></td>
                            <td><?= htmlentities($hourly["hourly_pm"]) ?></td>
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
            
                <label for="lundi"><input type="text" id="lundi" name="name_day" value="<?= htmlentities($hourly["name_day"]) ?>" class="form-input"></label>

                <label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" value="<?= htmlentities($hourly["hourly_am"]) ?>" class="form-input"></label>

                <label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" value="<?= htmlentities($hourly["hourly_pm"]) ?>" class="form-input"></label>

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