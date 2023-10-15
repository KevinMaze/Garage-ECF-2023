<?php  

require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/opinion.php");
require_once ('template-admin/header-admin.php');

$error = false;
$messages = [];
$errors = [];

try {
    if(isset($_GET["id"])){
        $opinion = getOpinionById($pdo, (int)$_GET["id"]);
        if($opinion === false){
            $errors[]="L'article n'hexiste pas";
        }
        if (!$opinion){
            $error = true;
            }
        }else {
        $error = true;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    if(isset($_POST["add_opinion_verify"])){
        $opinionVerify = addVerifyOpinion($pdo, htmlspecialchars($_POST["name"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["opinion_text"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["note"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["verify"], ENT_IGNORE, 'UTF-8'), $_GET["id"]);
        if($opinionVerify) {
            $messages[] = "Vérification effectué et envoyé";
        }else{
            $errors[] = "Une erreur s'est produite !";
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<?php  if (!$error) {?>

    <section class="flux">

        <div class="line-style"></div>

            <h2 class="title-h2">Modération avis client</h2>

            <?php foreach ($messages as $message) { ?>
                    <div class="alert alert-success"><?= $message; ?></div>
            <?php }?>
            <?php foreach ($errors as $error) { ?>
                    <div class="alert alert-danger"><?= $error; ?></div>
            <?php }?>

        <div class="line-style"></div>

        <form method="POST">
            <fieldset class="form-opinion">
            
                <label for="name"><input name="name" type="text" id="name" class="form-input" value="<?= htmlentities($opinion["name"]) ?>"></label>

                <textarea name="opinion_text" type="textarea" id="ask" class="form-textarea"><?= htmlentities($opinion["opinion_text"])?></textarea>

                <label for="note" id="note">
                <select name="note" id="note-select" class="form-input">
                    <option value="<?= $opinion["note"]?>"><?= $opinion["note"]?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select></label>

                <label for="verify"><input name="verify" type="text" id="name" class="form-input" placeholder="Taper 'yes' pour valider l'avis"></label>

                <div class="form-button">
                    <input name="add_opinion_verify" type="submit" value="Envoyer" class="custom-button">
                </div>
            </fieldset>
        </form>

    </section>

<?php }else {?>
    <h1 class="title-h2"><?= _ERROR_MESSAGE_ ?></h1>
<?php }?>
<?php require_once ("template-admin/footer-admin.php") ?>