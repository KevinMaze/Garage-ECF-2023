<?php 
require_once ("lib/car.php");
require_once ('lib/main_menu.php');
require_once ('template/header.php');

$id = $_GET["id"];
$car = $cars[$id];


?>

<div class="line-style flux"></div>

<section class="flux">

    <div class="section-occasion-page">
        <h2 class="title-h2"><?= $car["title"]?></h2>

        <div class="line-inside-div-style"></div>
        
        <div id="carouselExampleCaptions" class="carousel slide carrousel-occasion-page">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner flux border-shadow">
                    <div class="carousel-item active">
                        <img src="upload/cars/<?=$car["image"]?>" class="d-block w-100" alt="...">
                    </div>
                </div>
        </div>

        <div class="line-inside-div-style"></div>
        
        <div class="section-occasion-page__description">
            <p class="section-occasion-page__description__para"><?= $car["description"]?></p>

            <div>
                <p>Kilomètres = 20.000 km</p>
                <p>Années = 2015</p>
                <p>Prix = <?= $car["price"]?></p>
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
	<form action="">
		<fieldset class="form-style">
			<legend class="form-legend">Formulaire de contact</legend>
		
			<label for="name"><input type="text" id="name" placeholder="Nom" required class="form-input"></label>
			<label for="firstName"><input type="text" id="firstName" placeholder="Prénom" required class="form-input"></label>
			<label for="email"><input type="email" id="email" placeholder="exemple@exemple.com" required class="form-input"></label>
			<label for="telephone"><input type="tel" id="telephone" placeholder="Téléphone" class="form-input"></label>
			<textarea type="textarea" id="ask" placeholder="Demande" class="form-textarea"></textarea>
			<label for="ref"><input type="text" id="ref" placeholder="Référence annonce" required class="form-input"></label>
			<div class="form-button">
				<input type="submit" value="Envoyer" class="custom-button">
			</div>

		</fieldset>
	</form>
</section>



<div class="line-style flux"></div>

<?php 
require_once ('template/footer.php')
?>
