<?php  
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ('lib/car.php');
    require_once ('lib/services.php');
    require_once ('lib/opinion.php');
    require_once ('lib/main_menu.php');
    require_once ("template/header.php");

    $cars = getCars($pdo, 3);
    $services = getServices($pdo);
    $opinions = getOpinions($pdo, 3);
?>

        <div class="line-style flux"></div>

        <section class="section__service flux">
            <h2 class="title-h2">Les services</h2>
            <div class="line-style flux"></div>
            <div class="card-grid">
                <?php foreach ($services as $key => $service) {?>

                    <div class="card-service">
                        <div class="section__service__img">
                            <a href="./service.php#<?=$service["name_service"]?>"><img src=".<?=_SERVICE_IMG_PATH_.$service['image_service']?>" alt="<?=$service['image_service']?>"></a>
                        </div>
                        <p><?= $service['name_service'] ?></p>
                    </div>
                <?php } ?>
            </div>
        </section>

        <div class="line-style flux"></div>

        <section class="carrousel-last-occasion flux">
            <h2 class="title-h2">Dernières Occasions</h2>
            <div class="line-style flux"></div>
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner flux border-shadow">
                    <?php foreach ($cars as $key => $car) {
                            $image_car = selectOneImage($pdo, $car["car_id"], 1);
                            if ($image_car == "") {
                                $imagePath = "./assets/default.jpg";
                            }
                            else {
                                $imagePath = "."._CAR_IMAGE_PATH_.$image_car["name_image"];
                            }?>
                        <div class="carousel-item active">
                            <img src="<?= $imagePath?>" class="d-block w-100" alt="<?= $imagePath?>">
                            <div class="carousel-caption d-none d-md-block">
                                <h3><?= htmlentities($car["name"])?></h3>
                                <p><?= htmlentities($car["mileage"])?> km | <?= htmlentities($car["year"])?> | <?= htmlentities($car["price"])?> €</p>
                            </div>
                        </div>
                    <?php }; ?>

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
        </section>

        <div class="line-style flux"></div>

        <section class="section__opinion flux">
            <h2 class="title-h2">Dernier avis</h2>
            <div class="line-style flux"></div>
            <?php foreach ($opinions as $key => $opinion)  {
                    if($opinion["verify"] == "yes") {?>  
                    <div class="section__last-opinion border-shadow">
                        <h3><?= $opinion["name"] ?></h3>
                        <div class="line-inside-div-style flux"></div>
                        <p><?= $opinion["opinion_text"] ?>.</p>
                        <p class="section__opinion__note">Note : <?= $opinion["note"] ?> / 5</p>
                    </div>
                    <?php } ?>
            <?php } ?>
        </section>

        <div class="line-style flux"></div>

<?php  
    require_once ("template/footer.php")
?>