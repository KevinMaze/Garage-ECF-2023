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
    $imagesCar = selectImageCar($pdo, (int)$_GET["id"]);
    $equipment = selectEquipment($pdo, (int)$_GET["id"]);
    if (!$car){
    $error = true;
    }
}else {
$error = true;
}

if(isset($_POST["add-car"])){
    $user_id = intval($_SESSION["user"]["user_id"]);
    $result = changeCar($pdo, $_POST["name"], $_POST["description"], $_POST["price"], $_POST["mileage"], $_POST["year"], $_GET["id"], $user_id);
    $equipment = changeEquipment($pdo, $_POST["equipment"], $car["car_id"]);
    if($result){
        $messages[] = "Modification effectué";
    }else{
        $errors[] = "Une erreur s'est produite";
    }
}

if (isset($_FILES["file1"]["tmp_name"]) && ($_FILES["file1"]["tmp_name"] != "")){
    $fileName1 = null;
    $checkImage = getimagesize($_FILES["file1"]["tmp_name"]);
    // si image alors ok
    if ($checkImage != false){
        $fileName1 = slugify(basename($_FILES["file1"]["name"]));
        $fileName1 = uniqid()."-".$fileName1;
        // On déplace le fichier dans upload/car
        move_uploaded_file($_FILES["file1"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName1);
        $imageCar = addImageCar($pdo, $fileName1, $_GET["id"]);
        $messages[] = "Image envoyée";
    }else { 
        //sinon
        $errors[] = "Fichier non conforme";
    }
}
if (isset($_FILES["file2"]["tmp_name"]) && ($_FILES["file2"]["tmp_name"] != "")){
    $fileName2 = null;
    $checkImage = getimagesize($_FILES["file2"]["tmp_name"]);
    // si image alors ok
    if ($checkImage != false){
        $fileName2 = slugify(basename($_FILES["file2"]["name"]));
        $fileName2 = uniqid()."-".$fileName1;
        // On déplace le fichier dans upload/car
        move_uploaded_file($_FILES["file2"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName2);
        $imageCar = addImageCar($pdo, $fileName2, $_GET["id"]);
        $messages[] = "Image envoyée";
    }else { 
        //sinon
        $errors[] = "Fichier non conforme";
    }
}
if (isset($_FILES["file3"]["tmp_name"]) && ($_FILES["file3"]["tmp_name"] != "")){
    $fileName3 = null;
    $checkImage = getimagesize($_FILES["file3"]["tmp_name"]);
    // si image alors ok
    if ($checkImage != false){
        $fileName3 = slugify(basename($_FILES["file3"]["name"]));
        $fileName3 = uniqid()."-".$fileName3;
        // On déplace le fichier dans upload/car
        move_uploaded_file($_FILES["file3"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName3);
        $imageCar = addImageCar($pdo, $fileName3, $_GET["id"]);
        $messages[] = "Image envoyée";
    }else { 
        //sinon
        $errors[] = "Fichier non conforme";
    }
}
if (isset($_FILES["file4"]["tmp_name"]) && ($_FILES["file4"]["tmp_name"] != "")){
    $fileName4 = null;
    $checkImage = getimagesize($_FILES["file4"]["tmp_name"]);
    // si image alors ok
    if ($checkImage != false){
        $fileName4 = slugify(basename($_FILES["file4"]["name"]));
        $fileName4 = uniqid()."-".$fileName4;
        // On déplace le fichier dans upload/car
        move_uploaded_file($_FILES["file4"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName4);
        $imageCar = addImageCar($pdo, $fileName4, $_GET["id"]);
        $messages[] = "Image envoyée";
    }else { 
        //sinon
        $errors[] = "Fichier non conforme";
    }
}

?>

<?php  if (!$error) {?>

    <section class="flux">
        <form method="POST" action="" enctype="multipart/form-data" class="form-add-car">
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

                <p class="para-select-image">Veuiller selectionner jusqu'à 4 images du véhicule (2.5 mo max)</p>

                <?php foreach ($imagesCar as $key => $imageCar) {
                        if($imagesCar != ""){?>
                    <div>
                        <div>
                            <img src="..<?=_CAR_IMAGE_PATH_.$imageCar["name_image"]?>" alt="#" class="w-25">
                            <input type="submit" name="delete_image" id="delete_image" value="Supprimer l'image" class="custom-button">
                            <input type="hidden" name="delete_image" value="<?= $imageCar['image_id']; ?>">
                        </div>
                    </div>
                        <?php } ?>
                <?php } ?>
                <?php if(isset($_POST["delete_image"])){
                            deleteImageCar($pdo, $imageCar['image_id']);
                            $messages[] = "L'image a été supprimer";
                        }else{
                            $errors[] = "Le fichier n'existe plus";
                        }?>

                <input type="file" id="file1" name="file1" accept="image/png, image/jpg, image/jpeg" class="form-file">
                <input type="file" id="file2" name="file2" accept="image/png, image/jpg, image/jpeg" class="form-file">
                <input type="file" id="file3" name="file3" accept="image/png, image/jpg, image/jpeg" class="form-file">
                <input type="file" id="file4" name="file4" accept="image/png, image/jpg, image/jpeg" class="form-file">

                <div class="form-button">
                    <input type="submit" name="add-car" value="Envoyer" class="custom-button">
                </div>
                
            </fieldset>
        </form>
    </section>

<?php }else {?>
    <h1 class="title-h2"><?= _ERROR_MESSAGE_ ?></h1>
<?php }?>


<?php require_once ("template-admin/footer-admin.php") ?>


