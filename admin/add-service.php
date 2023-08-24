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

//récupération des données services pour modif (requète)
if(isset($_GET["id"])){
    $service = getServiceById($pdo, $_GET["id"]);
    if($service === false){
        $errors[] = "Le service n'existe pas !";
    }
    $pageTitle = "Formulaire de modification";
}else{
    $pageTitle = "Formulaire d'ajout de service";
}

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
    }else{
        if(isset($_GET["id"])){
            if(isset($_POST["delete_image"])){
                unlink(dirname(__DIR__)._SERVICE_IMG_PATH_.$_POST["file"]);
            }else{
                $fileName = $_POST["file"];
            }
        }
    }

    // On stocke les données envoyé dans le tableau
    $service = [
        "name" => $_POST["name_service"],
        "description" => $_POST["description"],
    ];

    if(!$errors){
        if(isset($_GET["id"])){
            $id = (int)$_GET["id"];
        }else{
            $id = null;
        }

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
}
?>


    <?php if($service !== false) {?>
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
                
                <label for="name-service"><input type="text" id="name_service" name="name_service" class="form-input" value="<?= $service["name_service"] ?>"></label>
                
                <textarea type="textarea" id="description" name="description" class="form-textarea" value="<?= $service["description"]?>"></textarea>

                <p class="para-select-image">Veuiller selectionner 1 image (2.5mo max.)</p>
                
                <?php if (isset($_GET['id']) && isset($service["image_service"])) { ?>
                    <div>
                        <img src=<?=_SERVICE_IMG_PATH_.$service["image_service"]; ?> alt="<?= $service['name_service'] ?>" width="100">
                        <label for="delete_image"><input type="checkbox" name="delete_image" id="delete_image">Supprimer l'image</label>
                        <input type="hidden" name="file" value="<?= $service['image_service']; ?>">
                    </div>
                <?php } ?>

                <input type="hidden" name="MAX_FILE_SIZE" value="2621440" />
                <input type="file" id="file" name="file" accept="image/png, image/jpg, image/jpeg" class="form-file">

                <div class="form-button">
                    <input type="submit" name="add-service" value="Envoyer" class="custom-button">
                </div>

            </fieldset>
        </form>
    <?php }?>

<?php require_once ("template-admin/footer-admin.php") ?>