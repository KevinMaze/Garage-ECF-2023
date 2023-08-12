<?php  
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ('lib/car.php');
    require_once ('lib/main_menu.php');
    require_once ('lib/services.php');
    require_once ("template/header.php");

    $cars = getCars($pdo, 3);


    
?>

        <div class="line-style flux"></div>

        <section class="section__service flux">
            <h2 class="title-h2">Les services</h2>
            <div class="card-grid">
                <?php foreach ($service as $key => $service) {?>

                    <div class="card-service">
                        <div class="section__service__img">
                            <img src=<?= _SERVICE_IMG_PATH_.$service['image']?> alt="#">
                        </div>
                        <p><?= $service['title'] ?></p>
                    </div>
                <?php } ?>
            </div>
        </section>

        <div class="line-style flux"></div>

        <section class="carrousel-last-occasion">
            <h2 class="title-h2">Dernières Occasions</h2>
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner flux border-shadow">
                    <?php foreach ($cars as $key => $car) {
                            if ($car['image1'] === null) {
                                $imagePath = "assets/default.jpg";
                            }
                            else {
                                $imagePath = _CAR_IMAGE_PATH_.$car["image1"];
                            }?>
                        <div class="carousel-item active">
                            <img src="<?= $imagePath?>" class="d-block w-100" alt="...">
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
            <div class="section__last-opinion border-shadow">
                <h3>Name</h3>
                <div class="line-inside-div-style flux"></div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem voluptatum dolores iusto assumenda quibusdam repellendus rerum explicabo atque ipsum maxime incidunt aliquam tempore nulla dolor debitis similique vitae quae accusamus voluptate doloribus, omnis, optio alias quam quia. Fugit, incidunt consequatur.</p>
                <p class="section__opinion__note">Note : 5/5</p>
            </div>
        </section>

        <div class="line-style flux"></div>

<?php  
    require_once ("template/footer.php")
?>