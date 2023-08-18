<?php 
require_once ("template-admin/header-admin.php");
require_once ("../lib/tools.php");
require_once ("../lib/car.php");

$errors = [];
$messages = [];
// Si la touche "envoyer" est pressée
if(isset($_POST["add-car"])){
    $fileName1 = null;
    $fileName2 = null;
    $fileName3 = null;
    $fileName4 = null;
    if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != ""){
        $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
        // si image alors ok
        if ($checkImage != false) {
            $fileName1 = slugify(basename($_FILES["file"]["name"]));
            $fileName1 = uniqid()."-".$fileName;

            $fileName2 = slugify(basename($_FILES["file"]["name"]));
            $fileName2 = uniqid()."-".$fileName;

            $fileName3 = slugify(basename($_FILES["file"]["name"]));
            $fileName3 = uniqid()."-".$fileName;

            $fileName4 = slugify(basename($_FILES["file"]["name"]));
            $fileName4 = uniqid()."-".$fileName;
            
            // On déplace le fichier dans upload/car
            if(move_uploaded_file($_FILES["file"]["tmp_name"], _CAR_IMAGE_PATH_.$fileName1) || move_uploaded_file($_FILES["file"]["tmp_name"], _CAR_IMAGE_PATH_.$fileName2) || move_uploaded_file($_FILES["file"]["tmp_name"], _CAR_IMAGE_PATH_.$fileName3) || move_uploaded_file($_FILES["file"]["tmp_name"], _CAR_IMAGE_PATH_.$fileName4)){
                // On supprimer l'ancienne image si on a posté une nouvelle
                if(isset($_POST["image1"]) || isset($_POST["image2"]) || isset($_POST["image3"]) || isset($_POST["image4"])) {
                    unlink(_CAR_IMAGE_PATH_.$_POST["image1"]);
                    unlink(_CAR_IMAGE_PATH_.$_POST["image2"]);
                    unlink(_CAR_IMAGE_PATH_.$_POST["image3"]);
                    unlink(_CAR_IMAGE_PATH_.$_POST["image4"]);
                }else {
                    $errors[] = "Le fichier n\a pas été uploadé";
                }
        }else { 
            //sinon
            $errors[] = "Fichier non conforme";
        }
    }else {
        // Si aucun fichier n'a été envoyé
        if(isset($_GET["id"])){
            // Si on coche la case suppression de l'image, on supprime
            unlink(_CAR_IMAGE_PATH_.$_POST["image1"]);
            unlink(_CAR_IMAGE_PATH_.$_POST["image2"]);
            unlink(_CAR_IMAGE_PATH_.$_POST["image3"]);
            unlink(_CAR_IMAGE_PATH_.$_POST["image4"]);
        }else{
            $fileName1 = $_POST["image1"];
            $fileName2 = $_POST["image2"];
            $fileName3 = $_POST["image3"];
            $fileName4 = $_POST["image4"];
            }
        }
    }
    
    // On stocke les données envoyé dans un tableau, pour ne pas perdre les données saisi
    $car = [
        "name" => $_POST["name"],
        "description" => $_POST["description"],
        "price" => $_POST["price"],
        "mileage" => $_POST["mileage"],
        "year" => $_POST["year"]
    ];
    
    if(!$errors) {
        if(isset($_GET["id"])){
            $id = (int)$_GET["id"];
        }else {
            $id = null;
        }
        $result = addCar($pdo, $_POST["name"], $_POST["description"], $_POST["price"], $_POST["mileage"], $_POST["price"], $_POST["year"], $filename1, $filename2, $filename3, $filename4);
        // Si un fichier est envoyé
        if ($result) {
            $messages[] = "Enregistrement effectuer";
            // On vide le tableau des données
            if(!isset($_GET["id"])){
                $car = [
                    "name" => "",
                    "description" => "",
                    "price" => "",
                    "mileage" => "",
                    "year" => ""
                ];
            }
        }else {
            $errors[] = "Une erreur s'est produite !";
        }
    }
}
    var_dump($_POST);
    var_dump($_FILES);
?>


    <?php 
    foreach ($messages as $message) { ?>
        <div class="alert alert-sucess"><?php $message; ?></div>
        <?php }?>
    <?php 
    foreach ($errors as $error) { ?>
        <div class="alert alert-danger"><?php $error; ?></div>
        <?php }?>
        
        <form method="POST" action="" enctype="multipart/form-data" class="form-add-car">
            <fieldset class="form-style">
                <legend class="form-legend">Formulaire d'ajout de voiture</legend>
                
                <div class="line-style"></div>
                
                <label for="name"><input type="text" id="name" name="name" placeholder="Nom" required class="form-input"></label>
                
                <textarea type="textarea" id="description" name="description" placeholder="Description" class="form-textarea"></textarea>
                
                <label for="price"><input type="text" id="price" name="price" placeholder="Prix" required class="form-input"></label>
                
			<label for="mileage"><input type="text" id="mileage" name="mileage" placeholder="Kilométrage" required class="form-input"></label>

			<label for="year"><input type="text" id="year" name="year" placeholder="Année" required class="form-input"></label>

            <p class="para-select-image">Veuiller selectionner jusqu'à 4 images du véhicule</p>

			<label for="image1" class="form-file__label"><input type="file" id="image1" name="image1" accept="image/png, image/jpg, image/jpeg" class="form-file"></label>

			<label for="image2" class="form-file__label"><input type="file" id="image2" name="image2" accept="image/png, image/jpg, image/jpeg" class="form-file"></label>

			<label for="image3" class="form-file__label"><input type="file" id="image3" name="image3" accept="image/png, image/jpg, image/jpeg" class="form-file"></label>

			<label for="image4" class="form-file__label"><input type="file" id="image4" name="image4" accept="image/png, image/jpg, image/jpeg" class="form-file"></label>

			<div class="form-button">
				<input type="submit" name="add-car" value="Envoyer" class="custom-button">
			</div>

		</fieldset>
	</form>