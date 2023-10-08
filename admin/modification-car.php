<?php  

require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/tools.php");
require_once ("../lib/user.php");
require_once ("../lib/car.php");
require_once ('template-admin/header-admin.php');

$error = false;
$messages = [];
$errors = [];

if(isset($_GET["id"])){
    $car = getCarById($pdo, (int)$_GET["id"]);
    $imagesCar = selectImage($pdo, (int)$_GET["id"]);
    $equipment = selectEquipment($pdo, (int)$_GET["id"]);
    if (!$car){
    $error = true;
    }
}else {
$error = true;
}

if(isset($_POST["add-car"])){
    $user_id = intval($_SESSION["user"]["user_id"]);
    $result = changeCar($pdo, htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_POST["description"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_POST["price"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_POST["mileage"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_POST["year"], ENT_QUOTES, 'UTF-8'), (int)$_GET["id"], (int) $user_id);
    $equipment = changeEquipment($pdo, htmlspecialchars($_POST["equipment"], ENT_QUOTES, 'UTF-8'), (int) $_GET["id"]);
    if($result){
        $messages[] = "Modification effectué";
    }else{
        $errors[] = "Une erreur s'est produite";
    }
}

if(isset($_POST["add_image"])){
    $filename = null;
    foreach ($_FILES["file"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK){
            $checkImage = getimagesize($_FILES["file"]["tmp_name"][$key]);
            // si image alors ok
            if ($checkImage != false) {
                $fileName = slugify(basename($_FILES["file"]["name"][$key]));
                $fileName = uniqid()."-".$fileName;
                // On déplace le fichier dans upload/car
                move_uploaded_file($_FILES["file"]["tmp_name"][$key], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName);
                $imageCar = addImageCar($pdo, $fileName, (int) $_GET["id"]);
            }else { 
                //sinon
                $errors[] = "Fichier non conforme";
            }
        }
        $messages[] = "Enregistrement effectuer";
    } 
}

if(isset($_POST["delete_image"])){
    deleteImageCar($pdo, $imageCar['image_id']);
    $messages[] = "L'image a été supprimer";
}else{
    $errors[] = "Le fichier n'existe plus";
}

var_dump($_FILES);

?>


    <section class="flux">
        <form method="POST" enctype="multipart/form-data" class="form-add-car">
            <?php 
            foreach ($messages as $message) { ?>
                <div class="alert alert-success"><?= $message ?></div>
                <?php }?>
            <?php 
            foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
                <?php }?>
            <fieldset class="form-style">
                <legend class="form-legend">Formulaire de modification</legend>
                
                <div class="line-style"></div>
                
                <label for="name"><input type="text" id="name" name="name" value=<?= $car["name"] ?>  class="form-input"></label>
                
                <textarea type="textarea" id="description" name="description" class="form-textarea"><?=$car["description"]?></textarea>
                
                <label for="price"><input type="text" id="price" name="price" value=<?= $car["price"]?> class="form-input"></label>
                    
                <label for="mileage"><input type="text" id="mileage" name="mileage" value=<?= $car["mileage"]?> class="form-input"></label>

                <label for="year"><input type="text" id="year" name="year" value=<?= $car["year"]?> class="form-input"></label>

                <textarea type="textarea" id="equipment" name="equipment" class="form-textarea"><?= $equipment["name_equipment"] ?></textarea>

                <div class="form-button">
                    <input type="submit" name="add-car" value="Envoyer Article" class="custom-button">
                </div>
                
            </fieldset>
        </form>

        <form method="POST" enctype="multipart/form-data" class="form-add-car">
            <fieldset class="form-style">

                <p class="para-select-image">Supprimer ou selectionner la ou les images du véhicule (2.5 mo max)</p>
                
                <?php foreach ($imagesCar as $key => $imageCar) {
                    if($imagesCar != ""){?>
                    <div>
                        <div>
                            <img src="..<?=_CAR_IMAGE_PATH_.$imageCar["name_image"]?>" alt="#" class="w-25">
                            <input type="submit" name="delete_image" id="delete_image" value="Supprimer l'image" class="custom-button">
                            <input type="hidden" name="delete_image" value="<?= $imageCar['image_id']; ?>">
                        </div>
                    </div>
                    <?php } 
                }?>

                <input type="file" id="file" name="file[]" accept="image/png, image/jpg, image/jpeg" class="form-file" multiple>

                <div class="form-button">
                    <input type="submit" name="add-image" value="Envoyer Image(s)" class="custom-button">
                </div>
            
            </fieldset>
        </form>

    </section>



<?php require_once ("template-admin/footer-admin.php") ?>