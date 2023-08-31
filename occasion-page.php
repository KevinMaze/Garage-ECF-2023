<?php 
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ("lib/car.php");
    require_once ("lib/form-contact.php");
    require_once ('lib/main_menu.php');
    require_once ('template/header.php');
    
    $error = false;
    $messages = [];
    $errors = [];

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $car = getCarById($pdo, $id);
        if (!$car){
            $error = true;
        }
    }else {
        $error = true;
    }
    
    if(isset($_POST["add-contact"])){
        $result = addContact($pdo, $_POST["lastname"], $_POST["firstname"], $_POST["email"], $_POST["phone"], $_POST["text"], $_POST["car_id"]);
        if($result){
            $messages[] = "Votre message a bien été envoyé";
        }else{
            $errors[] = "Une erreur est survenue, veuillez rééssayer ultérieurement";
        }
    }
    
    $arrayImages = selectImageCar($pdo, $id);
?>

<div class="line-style flux"></div>

<?php  if (!$error) {?>

    <section class="flux">
        <?php foreach ($messages as $message) { ?>
                <div class="alert alert-success"><?= $message ?></div>
        <?php }?>
        <?php foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
        <?php }?>

        <div class="section-occasion-page">
            <h2 class="title-h2"># <?= $car["car_id"] ?> | <?= $car["name"]?></h2>

            <div class="line-inside-div-style"></div>
            
            <div class="image-grid__occasion-page">
                <?php foreach ($arrayImages as $key => $arrayImage){ 
?> 
                        <img src=".<?=_CAR_IMAGE_PATH_.$arrayImage["name_image"]?>" class="img-occasion-page" alt="<?=$arrayImage["name_image"]?>">
                <?php } ?>
            </div>

            <div class="line-inside-div-style"></div>
            
            <div class="section-occasion-page__description">
                <p class="section-occasion-page__description__para"><?= $car["description"]?></p>

                <div>
                    <p>Kilomètres = <?= $car['mileage']?> km</p>
                    <p>Années = <?= $car['year']?></p>
                    <p>Prix = <?= $car["price"]?> €</p>
                </div>
            </div>

            <div class="line-inside-div-style"></div>

            <h2 class="title-h2">Options / Equipements</h2>
            <div class="section-occasion-page__description__equipment">
                <p>Climatisation</p>
                <p>ABS</p>
                <p>Aide au démarrage en côte</p>
                <p>Direction assistée</p>
            </div>
        </div>
    </section>
    <div class="line-style flux"></div>

    <section class="flux">
	<form method="POST">
		<fieldset class="form-style">
            <legend class="form-legend">Formulaire de contact</legend>
            
            <div class="line-style flux"></div>
		
			<label for="lastname"><input name="lastname" type="text" id="lastname" placeholder="Nom" required class="form-input"></label>

			<label for="firstname"><input name="firstname" type="text" id="firstname" placeholder="Prénom" required class="form-input"></label>

			<label for="email"><input name="email" type="email" id="email" placeholder="exemple@exemple.com" required class="form-input"></label>

			<label for="phone"><input name="phone" type="tel" id="phone" placeholder="Téléphone" class="form-input"></label>

			<textarea name="text" type="textarea" id="ask" placeholder="Demande" class="form-textarea"></textarea>

			<label for="car_id"><input name="car_id" type="text" id="ref" required class="form-input" value="<?= $car["car_id"] ?>"></label>

			<div class="form-button">
				<input name="add-contact" type="submit" value="Envoyer" class="custom-button">
			</div>

		</fieldset>
	</form>
</section>

<?php }else {?>

    <h1 class="title-h2">Article Introuvable</h1>
<?php }?>




<div class="line-style flux"></div>

<?php 
require_once ('template/footer.php')
?>
