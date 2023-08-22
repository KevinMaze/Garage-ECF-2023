<?php 
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once  ("../lib/pdo.php");
require_once ("../lib/tools.php");
require_once ("../lib/services.php");
require_once ("template-admin/header-admin.php");

$errors = [];
$messages = [];

if(isset($_POST['add-service'])){
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

    if(!$errors){
        if(isset($_GET["id"])){
            $id = (int)$_GET["id"];
        }else{
            $id = null;
        }

        // on passe les données addService
        $result = addService($pdo, $_POST["name_service"], $_POST["description"], $_POST["user_id"], $fileName, $id);
        if($result) {
            $messages[] = "Enregistrement effectué";
            // on efface le tableau
            if(!isset($_GET["id"])){
                $service = [
                    "name" => "",
                    "description" => "",
                ];
            }else{
                $errors[] = "Une erreur s'est produite !";
            }
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
            <legend class="form-legend">Formulaire d'ajout de service</legend>
            
            <div class="line-style"></div>
            
            <label for="name-service"><input type="text" id="name_service" name="name_service" placeholder="Nom" required class="form-input"></label>
            
            <textarea type="textarea" id="description" name="description" placeholder="Description" class="form-textarea"></textarea>
            
            <label for="user_id"><input type="text" id="user_id" name="user_id" value="<?=$_SESSION["user"]["user_id"] ?>" required class="form-input"></label>

            <p class="para-select-image">Veuiller selectionner 1 image</p>

			<input type="file" id="file" name="file" accept="image/png, image/jpg, image/jpeg" class="form-file">

			<div class="form-button">
				<input type="submit" name="add-service" value="Envoyer" class="custom-button">
			</div>

		</fieldset>
	</form>