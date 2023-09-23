<?php 
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once  ("../lib/pdo.php");
require_once ("../lib/tools.php");
require_once ("../lib/services.php");
require_once ("template-admin/header-admin.php");

if (isset($_GET["page"])) {
    $page = (int)$_GET["page"];
}else {
    $page = 1;
}

// total pages service
$serviceArticles = getServices($pdo, _ADMIN_SERVICE_PER_PAGE_, $page);
$totalService = getTotalPageService($pdo);
$totalPageService = ceil($totalService / _ADMIN_SERVICE_PER_PAGE_);

// tableau des messages
$errors = [];
$messages = [];

// valeur a zero
$service = [
    'name_service' => '',
    'description' => ''
];

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
    }

    // On stocke les données envoyé dans le tableau
    $service = [
        "name" => $_POST["name_service"],
        "description" => $_POST["description"],
    ];
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
?>


    <section class="flux">

        <h2 class="title-h2">Services</h2>

        <div class="line-style"></div>

        <div class="section-admin__crud__description" id="services">
            <table class="table-style">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($serviceArticles as $key => $serviceArticle) {?>

                        <tr>
                        <th scope="row"><?= $serviceArticle["service_id"] ?></th>
                            <td><?= $serviceArticle["name_service"] ?></td>
                            <td><a href="modification-service.php?id=<?= $serviceArticle["service_id"] ?>">Modifier</a> | <a href="delete-service.php?id=<?= $serviceArticle["service_id"] ?>" class="delete">Supprimer</a></td>
                        </tr>
                        
                    <?php }  ?>

                </tbody>
            </table>

            <?php if ($totalPageService) {?>
            <nav>
                <ul class="navigation-page">
                    <?php for ($i = 1; $i <= $totalPageService; $i++) { ?>
                        <li class="navigation-page__item <?php if ($i === $page) echo "active-page" ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php }  ?>
                </ul>
            </nav>
            <?php }?>

        </div>

        <div class="line-style"></div>

        <form method="POST" enctype="multipart/form-data" class="form-add-car">
            <?php foreach ($messages as $message) { ?>
                    <div class="alert alert-success"><?= $message; ?></div>
            <?php }?>
            <?php foreach ($errors as $error) { ?>
                    <div class="alert alert-danger"><?= $error; ?></div>
            <?php }?>
            
            <fieldset class="form-style">
                <legend class="form-legend">Formulaire d'ajout de services</legend>
                
                <div class="line-style"></div>
                
                <label for="name-service"><input type="text" id="name_service" name="name_service" class="form-input"></label>
                
                <textarea type="textarea" id="description" name="description" class="form-textarea"></textarea>

                <p class="para-select-image">Veuiller selectionner 1 image (2.5mo max.)</p>
                
                <input type="hidden" name="MAX_FILE_SIZE" value="2621440" />
                <input type="file" id="file" name="file" accept="image/png, image/jpg, image/jpeg" class="form-file">

                <div class="form-button">
                    <input type="submit" name="add-service" value="Envoyer" class="custom-button">
                </div>

            </fieldset>
        </form>

    </section>

<?php require_once ("template-admin/footer-admin.php") ?>