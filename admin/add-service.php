<?php 
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once  ("../lib/pdo.php");
require_once ("../lib/tools.php");
require_once ("../lib/services.php");
require_once ("template-admin/header-admin.php");

$errors = [];
$messages = [];
$service = [
    'name_service' => '',
    'description' => ''
];
$pageTitle = "Formulaire d'ajout de service";

if(isset($_POST['add-service'])){
    $user_id = intval($_SESSION["user"]["user_id"]);
    $fileName = null;
    if(isset($_FILES["file"]["tmp_name"]) && ($_FILES["file"]["tmp_name"] != "")){
        $checkImage = getimagesize($_FILES["file"]["tmp_name"]);

        //si image ok
        if($checkImage != false){
            $fileName = slugify(basename($_FILES["file"]["name"]));
            $fileName = uniqid()."-".$fileName;
            move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__)._SERVICE_IMG_PATH_.$fileName);
        }else{
            // problème image upload
            $errors[] = "Fichier non conforme";
        }
    }

    // On stocke les données envoyé dans le tableau
    $service = [
        "name" => $_POST["name_service"],
        "description" => $_POST["description"],
    ];
    // on passe les données addService
    $result = addService($pdo, $_POST["name_service"], $_POST["description"], $fileName, $user_id);
    if($result) {
        $messages[] = "Enregistrement effectué";
        // on efface le tableau
        if(!isset($_GET["id"])){
            $service = [
                "name" => "",
                "description" => "",
            ];
        }
    }else{
        $errors[] = "Une erreur s'est produite !";
    }
}
?>
    <section class="flux">
        <form method="POST" enctype="multipart/form-data" class="form-add-car">
            <?php foreach ($messages as $message) { ?>
                    <div class="alert alert-success"><?= $message; ?></div>
            <?php }?>
            <?php foreach ($errors as $error) { ?>
                    <div class="alert alert-danger"><?= $error; ?></div>
            <?php }?>
            
            <fieldset class="form-style">
                <legend class="form-legend"><?= $pageTitle ?></legend>
                
                <div class="line-style"></div>
                
                <label for="name-service"><input type="text" id="name_service" name="name_service" class="form-input"></label>
                
                <textarea type="textarea" id="description" name="description" class="form-textarea"></textarea>

                <p class="para-select-image">Veuiller selectionner 1 image (2.5mo max.)</p>
                
                <input type="hidden" name="MAX_FILE_SIZE" value="2621440" />
                <input type="file" id="file" name="file" accept="image/png, image/jpg, image/jpeg" class="form-file">

                <div class="form-button">
                    <input type="submit" name="add-service" value="Envoyer" class="custom-button">
                </div>

            </fieldset>
        </form>

    </section>

<?php require_once ("template-admin/footer-admin.php") ?>