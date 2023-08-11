<?php 
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ("lib/car.php");

    $error = false;

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $car = getCar($pdo, $id);
        $arrayImages = [$car["image1"], $car["image2"], $car["image3"], $car["image4"]];
        if (!$car){
            $error = true;
        }
    }else {
        $error = true;
    }
    
    require_once ('lib/main_menu.php');
    require_once ('template/header.php');

?>

<div class="line-style flux"></div>

<?php  if (!$error) {?>

    <section class="flux">

        <div class="section-occasion-page">
            <h2 class="title-h2"><?= $car["name"]?></h2>

            <div class="line-inside-div-style"></div>
            
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner flux border-shadow">
                    <?php 
                    $count = 0;
                        foreach ($arrayImages as $key => $arrayImage){ 
                            if ($arrayImage != null ) {?> 
                            <div class="carousel-item active">
                                <img src="./upload/cars/<?= $arrayImage ?>" class="d-block w-100" alt="...">
                            </div> 
                            <?php }?>
                        <?php } ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
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
        <form action="">
            <fieldset class="form-style">
                <legend class="form-legend">Formulaire de contact</legend>
            
                <label for="name"><input type="text" id="name" placeholder="Nom" required class="form-input"></label>
                <label for="firstName"><input type="text" id="firstName" placeholder="Prénom" required class="form-input"></label>
                <label for="email"><input type="email" id="email" placeholder="exemple@exemple.com" required class="form-input"></label>
                <label for="telephone"><input type="tel" id="telephone" placeholder="Téléphone" class="form-input"></label>
                <textarea type="textarea" id="ask" placeholder="Demande" class="form-textarea"></textarea>
                <label for="ref"><input type="text" id="ref" placeholder="<?= $car['car_id']?>" required class="form-input"></label>
                <div class="form-button">
                    <input type="submit" value="Envoyer" class="custom-button">
                </div>

            </fieldset>
        </form>
    </section>

<?php } else {?>

    <h1 class="title-h2">Article Introuvable</h1>
<?php }?>




<div class="line-style flux"></div>

<?php 
require_once ('template/footer.php')
?>
