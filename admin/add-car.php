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
    $result = addCar($pdo, htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_POST["description"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_POST["price"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_POST["mileage"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_POST["year"], ENT_QUOTES, 'UTF-8'), $user_id);
    // Si un fichier est envoyé
    if ($result) {
        $filename = null;
        $equipment = addEquipment($pdo, $_POST["equipment"], $result);
        foreach ($_FILES["file"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK){
                $checkImage = getimagesize($_FILES["file"]["tmp_name"][$key]);
                // si image alors ok
                if ($checkImage != false) {
                    $fileName = slugify(basename($_FILES["file"]["name"][$key]));
                    $fileName = uniqid()."-".$fileName;
                    // On déplace le fichier dans upload/car
                    move_uploaded_file($_FILES["file"]["tmp_name"][$key], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName);
                    $imageCar = addImageCar($pdo, $fileName, $result);
                }else { 
                    //sinon
                    $errors[] = "Fichier non conforme";
                }
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
        <table class="table-style">
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
                        <td><a href="modification-car.php?id=<?= $carArticle["car_id"] ?>">Modifier</a> | 
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal<?= $carArticle["car_id"] ?>" class="custom-button-admin">Supprimer</button>
                            <div class="modal fade" id="exampleModal<?= $carArticle["car_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="title-modal" id="exampleModalLabel">Suppression de l'article <?= $carArticle["car_id"] ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Attention, vous êtes sur le point de supprimer l'article <?= $carArticle["name"] ?>. La suppression est définitive.
                                            Etes-vous sûr ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-danger"><a href="delete-car.php?id=<?=$carArticle["car_id"] ?>">Supprimer</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
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
            <legend class="form-legend">Formulaire d'ajout de voiture</legend>
            
            <div class="line-style"></div>
            
            <label for="name"><input type="text" id="name" name="name" placeholder="Nom"  class="form-input"></label>
            
            <textarea type="textarea" id="description" name="description" placeholder="Description" class="form-textarea"></textarea>
            
            <label for="price"><input type="text" id="price" name="price" placeholder="Prix" class="form-input"></label>
                
            <label for="mileage"><input type="text" id="mileage" name="mileage" placeholder="Kilométrage" class="form-input"></label>

            <label for="year"><input type="text" id="year" name="year" placeholder="Année" class="form-input"></label>

            <textarea type="textarea" id="equipment" name="equipment" placeholder="Equipements / Options : saut de ligne entre chaque equipements ou options" class="form-textarea"></textarea>

            <p class="para-select-image">Veuiller selectionner jusqu'à 4 images du véhicule (2.5 mo max)</p>

            <input type="file" id="file" name="file[]" accept="image/png, image/jpg, image/jpeg" class="form-file">
            
            <input type="file" id="file" name="file[]" accept="image/png, image/jpg, image/jpeg" class="form-file">
            
            <input type="file" id="file" name="file[]" accept="image/png, image/jpg, image/jpeg" class="form-file">
            
            <input type="file" id="file" name="file[]" accept="image/png, image/jpg, image/jpeg" class="form-file">
            
            <div class="form-button">
                <input type="submit" name="add-car" value="Envoyer" class="custom-button">
            </div>
            
        </fieldset>
    </form>
</section>


<?php require_once ("template-admin/footer-admin.php") ?>

    