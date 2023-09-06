<?php 
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once ("../lib/tools.php");
require_once  ("../lib/pdo.php");
require_once ("../lib/car.php");
require_once ("template-admin/header-admin.php");

if (isset($_GET["page"])) {
    $page = (int)$_GET["page"];
}else {
    $page = 1;
}

// total pages car
$carArticles = getCars($pdo, _ADMIN_CAR_PER_PAGE_, $page);
$totalArticleCar = getTotalPageCar($pdo);
$totalPageCar = ceil($totalArticleCar / _ADMIN_CAR_PER_PAGE_);
// tableau des messages
$errors = [];
$messages = [];
// valeurs vide
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
    $user_id = intval($_SESSION["user"]["user_id"]);
    // On stocke les données envoyé dans un tableau, pour ne pas perdre les données saisi
    $car = [
        "name" => $_POST["name"],
        "description" => $_POST["description"],
        "price" => $_POST["price"],
        "mileage" => $_POST["mileage"],
        "year" => $_POST["year"],
    ];
    
    // On passe les données a addCar
    $result = addCar($pdo, $_POST["name"], $_POST["description"], $_POST["price"], $_POST["mileage"], $_POST["year"], $user_id);
    // Si un fichier est envoyé
    if ($result) {
        $equipment = addEquipment($pdo, $_POST["equipment"], $result);
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
        $fileName2 = null;
        if (isset($_FILES["file2"]["tmp_name"]) && ($_FILES["file2"]["tmp_name"] != "")){
            $checkImage = getimagesize($_FILES["file2"]["tmp_name"]);
            // si image alors ok
            if ($checkImage != false) {
                $fileName2 = slugify(basename($_FILES["file2"]["name"]));
                $fileName2 = uniqid()."-".$fileName2;
                // On déplace le fichier dans upload/car
                move_uploaded_file($_FILES["file2"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName2);
                $imageCar = addImageCar($pdo, $fileName2, $result);
            }else { 
                //sinon
                $errors[] = "Fichier non conforme";
            }
        }
        $fileName3 = null;
        if (isset($_FILES["file3"]["tmp_name"]) && ($_FILES["file3"]["tmp_name"] != "")){
            $checkImage = getimagesize($_FILES["file3"]["tmp_name"]);
            // si image alors ok
            if ($checkImage != false) {
                $fileName3 = slugify(basename($_FILES["file3"]["name"]));
                $fileName3 = uniqid()."-".$fileName3;
                // On déplace le fichier dans upload/car
                move_uploaded_file($_FILES["file3"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName3);
                $imageCar = addImageCar($pdo, $fileName3, $result);
            }else { 
                //sinon
                $errors[] = "Fichier non conforme";
            }
        }
        $fileName4 = null;
        if (isset($_FILES["file4"]["tmp_name"]) && ($_FILES["file4"]["tmp_name"] != "")){
            $checkImage = getimagesize($_FILES["file4"]["tmp_name"]);
            // si image alors ok
            if ($checkImage != false) {
                $fileName4 = slugify(basename($_FILES["file4"]["name"]));
                $fileName4 = uniqid()."-".$fileName4;
                // On déplace le fichier dans upload/car
                move_uploaded_file($_FILES["file4"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName4);
                $imageCar = addImageCar($pdo, $fileName4, $result);
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

    <h2 class="title-h2"  id="articles">Articles</h2>
    
    <div class="line-style"></div>

    <div class="section-admin__crud__description" id="article-car">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($carArticles as $key => $carArticle) {?>

                    <tr>
                    <th scope="row"><?= $carArticle["car_id"] ?></th>
                        <td><?= $carArticle["name"] ?></td>
                        <td><a href="modification-car.php?id=<?= $carArticle["car_id"] ?>">Modifier</a> | <a href="delete-car.php?id=<?=$carArticle["car_id"] ?>" id="delete">Supprimer</a></td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
        <?php if ($totalPageCar) {?>
                <nav>
                    <ul class="navigation-page">
                        <?php for ($i = 1; $i <= $totalPageCar; $i++) { ?>
                            <li class="navigation-page__item <?php if ($i === $page) echo "active-page" ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php }  ?>
                    </ul>
                </nav>
        <?php }?>
    </div>

    <div class="line-style"></div>

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

            <textarea type="textarea" id="equipment" name="equipment" placeholder="Equipements / Options : saut de ligne entre chaque equipements ou options" class="form-textarea"></textarea>

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

    