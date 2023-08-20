<?php 
require_once ("template-admin/header-admin.php");
require_once ("../lib/tools.php");

$errors = [];
$messages = [];
// Si la touche "envoyer" est pressée
if(isset($_POST["add-car"])){
    $fileName1 = null;
    $fileName2 = null;
    $fileName3 = null;
    $fileName4 = null;
    if (isset($_FILES["file1"]["tmp_name"]) && ($_FILES["file1"]["tmp_name"] != "")){
        $checkImage = getimagesize($_FILES["file1"]["tmp_name"]);

        // si image alors ok
        if ($checkImage != false) {
            $fileName1 = slugify(basename($_FILES["file1"]["name"]));
            $fileName1 = uniqid()."-".$fileName1;

            // On déplace le fichier dans upload/car
            if(move_uploaded_file($_FILES["file1"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName1)){
                // On supprimer l'ancienne image si on a posté une nouvelle
                // if(isset($_POST["file1"])) {
                //     unlink(dirname(__DIR__)._CAR_IMAGE_PATH_.$_POST["image1"]);
                // }else {
                //     $errors[] = "Le fichier n\a pas été uploadé";
                // }
            }else { 
                //sinon
                $errors[] = "Fichier non conforme";
            }
        }
        // else {
        //     // Si aucun fichier n'a été envoyé
        //     if(isset($_GET["id"])){
        //     // Si on coche la case suppression de l'image, on supprime
        //     unlink(dirname(__DIR__)._CAR_IMAGE_PATH_.$_POST["image1"]);
        //     }else{
        //         $fileName = $_POST["image1"];
        //     }
        // }
    }
    if (isset($_FILES["file2"]["tmp_name"]) && ($_FILES["file2"]["tmp_name"] != "")){
        $checkImage = getimagesize($_FILES["file2"]["tmp_name"]);

        // si image alors ok
        if ($checkImage != false) {
            $fileName2 = slugify(basename($_FILES["file2"]["name"]));
            $fileName2 = uniqid()."-".$fileName2;

            // On déplace le fichier dans upload/car
            if(move_uploaded_file($_FILES["file2"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName2)){
                // // On supprimer l'ancienne image si on a posté une nouvelle
                // if(isset($_POST["file2"])) {
                //     unlink(dirname(__DIR__)._CAR_IMAGE_PATH_.$_POST["image2"]);
                // }else {
                //     $errors[] = "Le fichier n\a pas été uploadé";
                // }
            }else { 
                //sinon
                $errors[] = "Fichier non conforme";
            }
        }
        // else {
        //     // Si aucun fichier n'a été envoyé
        //     if(isset($_GET["id"])){
        //     // Si on coche la case suppression de l'image, on supprime
        //     unlink(dirname(__DIR__)._CAR_IMAGE_PATH_.$_POST["image2"]);
        //     }else{
        //         $fileName = $_POST["image2"];
        //     }
        // }
    }
    if (isset($_FILES["file3"]["tmp_name"]) && ($_FILES["file3"]["tmp_name"] != "")){
        $checkImage = getimagesize($_FILES["file3"]["tmp_name"]);

        // si image alors ok
        if ($checkImage != false) {
            $fileName2 = slugify(basename($_FILES["file3"]["name"]));
            $fileName2 = uniqid()."-".$fileName3;

            // On déplace le fichier dans upload/car
            if(move_uploaded_file($_FILES["file3"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName3)){
                // // On supprimer l'ancienne image si on a posté une nouvelle
                // if(isset($_POST["file3"])) {
                //     unlink(dirname(__DIR__)._CAR_IMAGE_PATH_.$_POST["image3"]);
                // }else {
                //     $errors[] = "Le fichier n\a pas été uploadé";
                // }
            }else { 
                //sinon
                $errors[] = "Fichier non conforme";
            }
        }
        // else {
        //     // Si aucun fichier n'a été envoyé
        //     if(isset($_GET["id"])){
        //     // Si on coche la case suppression de l'image, on supprime
        //     unlink(dirname(__DIR__)._CAR_IMAGE_PATH_.$_POST["image3"]);
        //     }else{
        //         $fileName = $_POST["image3"];
        //     }
        // }
    }
    if (isset($_FILES["file4"]["tmp_name"]) && ($_FILES["file4"]["tmp_name"] != "")){
        $checkImage = getimagesize($_FILES["file4"]["tmp_name"]);

        // si image alors ok
        if ($checkImage != false) {
            $fileName2 = slugify(basename($_FILES["file4"]["name"]));
            $fileName2 = uniqid()."-".$fileName4;

            // On déplace le fichier dans upload/car
            if(move_uploaded_file($_FILES["file4"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName4)){
                // // On supprimer l'ancienne image si on a posté une nouvelle
                // if(isset($_POST["file4"])) {
                //     unlink(dirname(__DIR__)._CAR_IMAGE_PATH_.$_POST["image4"]);
                // }else {
                //     $errors[] = "Le fichier n\a pas été uploadé";
                // }
            }else { 
                //sinon
                $errors[] = "Fichier non conforme";
            }
        }
        // else {
        //     // Si aucun fichier n'a été envoyé
        //     if(isset($_GET["id"])){
        //     // Si on coche la case suppression de l'image, on supprime
        //     unlink(dirname(__DIR__)._CAR_IMAGE_PATH_.$_POST["image4"]);
        //     }else{
        //         $fileName = $_POST["image4"];
        //     }
        // }
    }

    // On stocke les données envoyé dans un tableau, pour ne pas perdre les données saisi
    $car = [
        "name" => $_POST["name"],
        "description" => $_POST["description"],
        "price" => $_POST["price"],
        "mileage" => $_POST["mileage"],
        "year" => $_POST["year"],
    ];
    
    if(!$errors) {
        if(isset($_GET["id"])){
            $id = (int)$_GET["id"];
        }else {
            $id = null;
        }
        // On passe les données a addCar
        $result = addCar($pdo, $_POST["name"], $_POST["description"], $_POST["price"], $_POST["mileage"], $_POST["year"], $fileName1, $fileName2, $fileName3, $fileName4, $id);
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

			<input type="file" id="file1" name="file1" accept="image/png, image/jpg, image/jpeg" class="form-file">

			<input type="file" id="file2" name="file2" accept="image/png, image/jpg, image/jpeg" class="form-file">

			<input type="file" id="file3" name="file3" accept="image/png, image/jpg, image/jpeg" class="form-file">

			<input type="file" id="file4" name="file4" accept="image/png, image/jpg, image/jpeg" class="form-file">

			<div class="form-button">
				<input type="submit" name="add-car" value="Envoyer" class="custom-button">
			</div>

		</fieldset>
	</form>