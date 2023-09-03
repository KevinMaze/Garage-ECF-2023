<?php  

require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/tools.php");
require_once ("../lib/user.php");
require_once ("../lib/car.php");
require_once ('template-admin/header-admin.php');

$messages = [];
$errors = [];

if(isset($_GET["id"])){
    $car = getCarById($pdo, (int)$_GET["id"]);
    $imagesCar = selectImageCar($pdo, $car["car_id"]);
    if($car === false){
        $errors[]="L'article n'hexiste pas";
    }
}

foreach ($imagesCar as $key => $image) {
    if(isset($_POST["delete_image"])){
        if(file_exists($image["image_id"])){
            deleteImageCar($pdo, $car["car_id"]);
            $messages[] = "L'image a été supprimer";
        }else{
            $errors[] = "Le fichier n'existe plus";
        }
    }else{
        // $errors[] = "Une erreur s'est produit";
    }
}

if(isset($_POST["add-car"])){
    $result = changeCar($pdo, $_POST["name"], $_POST["description"], $_POST["price"], $_POST["mileage"], $_POST["year"], $_GET["id"]);
    if($result){
        $messages[] = "Modification effectué";
    }else{
        $errors[] = "Une erreur s'est produite";
    }
}

?>
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

            <p class="para-select-image">Veuiller selectionner jusqu'à 4 images du véhicule (2.5 mo max)</p>

            <?php foreach ($imagesCar as $key => $imageCar) {?>
                <div>
                    <div>
                        <input type="submit" name="delete_image" id="delete_image" value="Supprimer l'image<?= $imageCar['image_id'] ?>">
                        <input type="hidden" name="delete_image" value="<?= $imageCar['image_id']; ?>">
                    </div>
                    <input type="file" id="file" name="file" accept="image/png, image/jpg, image/jpeg" class="form-file">
                </div>
            <?php } ?>
<!--             
            <input type="file" id="file2" name="file2" accept="image/png, image/jpg, image/jpeg" class="form-file">
            
            <input type="file" id="file3" name="file3" accept="image/png, image/jpg, image/jpeg" class="form-file">
            
            <input type="file" id="file4" name="file4" accept="image/png, image/jpg, image/jpeg" class="form-file"> -->
            
            <div class="form-button">
                <input type="submit" name="add-car" value="Envoyer" class="custom-button">
            </div>
            
        </fieldset>
    </form>
</section>


<?php require_once ("template-admin/footer-admin.php") ?>


