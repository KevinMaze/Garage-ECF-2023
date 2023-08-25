<?php  

require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/tools.php");
require_once ("../lib/user.php");
require_once ("../lib/services.php");
require_once ('template-admin/header-admin.php');

$messages = [];
$errors = [];

if(isset($_GET["id"])){
    $service = getServiceById($pdo, (int)$_GET["id"]);
    if($service === false){
        $errors[]="L'article n'hexiste pas";
    }
    $pageTitle = "Formulaire de modification";
}

if(isset($_POST["add_service"])){
    if(isset($_POST["delete_image"])){
        if(file_exists($service["image_service"])){
            unlink(_SERVICE_IMG_PATH_.$service["image_service"]);
        }else{
            $errors[] = "Le fichier n'existe plus!";
        }
    }
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
    $result = changeService($pdo, $_POST["name_service"], $_POST["description"], $fileName, $user_id, $_GET["id"]);
    if($result){
        $messages[] = "Modification effectué";
    }else{
        $errors[] = "Une erreur s'est produite";
    }
}




?>

    <section class="flux">
        <h2 class="title-h2">Service actuelle</h2>
        <div class="line-style"></div>

        <div class="section-admin__crud__description">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>

                    </tr>
                </thead>
                <tbody>
                        <tr>
                        <th scope="row"><?= $service["service_id"] ?></th>
                            <td><?= $service["name_service"] ?></td>
                            <td><?= $service["description"] ?></td>
                        </tr>
                </tbody>
            </table>
        </div>

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
                
                <label for="name-service"><input type="text" id="name_service" name="name_service" value=<?= $service["name_service"] ?> class="form-input"></label>
                
                <textarea type="textarea" id="description" name="description" class="form-textarea"><?= $service["description"]?></textarea>

                <p class="para-select-image">Veuiller selectionner 1 image (2.5mo max.)</p>

                <div>
                    <label for="delete_image"  class="form-file"><input type="checkbox" name="delete_image" id="delete_image"> Supprimer l'image précedente</label>
                    <input type="hidden" name="file" value="<?= $service['image_service']; ?>">
                </div>

                
                <input type="hidden" name="MAX_FILE_SIZE" value="2621440" />
                <input type="file" id="file" name="file" accept="image/png, image/jpg, image/jpeg" class="form-file">

                <div class="form-button">
                    <input type="submit" name="add_service" value="Envoyer" class="custom-button">
                </div>

            </fieldset>
        </form>

    </section>

<?php require_once ("template-admin/footer-admin.php") ?>







