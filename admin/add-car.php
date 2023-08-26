<?php 
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once ("../lib/tools.php");
require_once  ("../lib/pdo.php");
require_once ("../lib/car.php");
require_once ("template-admin/header-admin.php");

$errors = [];
$messages = [];
$car = [
    'name' => '',
    'description' => '',
    'price' => '',
    'mileage' => '',
    'year' => '',
];
$pagetitle = "Formualire d'ajout de voiture";

// Si la touche "envoyer" est pressée
if(isset($_POST["add-car"])){
    // On stocke les données envoyé dans un tableau, pour ne pas perdre les données saisi
    $car = [
        "name" => $_POST["name"],
        "description" => $_POST["description"],
        "price" => $_POST["price"],
        "mileage" => $_POST["mileage"],
        "year" => $_POST["year"],
    ];
    
    // On passe les données a addCar
    $result = addCar($pdo, $_POST["name"], $_POST["description"], $_POST["price"], $_POST["mileage"], $_POST["year"]);
    var_dump($result);
    // Si un fichier est envoyé
    if ($result) {
        $fileName1 = null;
        if (isset($_FILES["file1"]["tmp_name"]) && ($_FILES["file1"]["tmp_name"] != "")){
            $checkImage = getimagesize($_FILES["file1"]["tmp_name"]);
            // si image alors ok
            if ($checkImage != false) {
                $fileName1 = slugify(basename($_FILES["file1"]["name"]));
                $fileName1 = uniqid()."-".$fileName1;
                // On déplace le fichier dans upload/car
                move_uploaded_file($_FILES["file1"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName1);
                $imageCar = addImageCar($pdo, $fileName1, $result);
            }else { 
                //sinon
                $errors[] = "Fichier non conforme";
            }
        }
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
            <legend class="form-legend"><?= $pagetitle ?></legend>
            
            <div class="line-style"></div>
            
            <label for="name"><input type="text" id="name" name="name" placeholder="Nom"  class="form-input"></label>
            
            <textarea type="textarea" id="description" name="description" placeholder="Description" class="form-textarea"></textarea>
            
            <label for="price"><input type="text" id="price" name="price" placeholder="Prix" class="form-input"></label>
                
            <label for="mileage"><input type="text" id="mileage" name="mileage" placeholder="Kilométrage" class="form-input"></label>

            <label for="year"><input type="text" id="year" name="year" placeholder="Année" class="form-input"></label>

            <p class="para-select-image">Veuiller selectionner jusqu'à 4 images du véhicule (2.5 mo max)</p>

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


<?php require_once ("template-admin/footer-admin.php") ?>

    