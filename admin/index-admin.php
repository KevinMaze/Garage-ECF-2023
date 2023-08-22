<?php  

require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/user.php");
require_once ("../lib/car.php");
require_once ("../lib/services.php");
require_once ("../lib/hourly.php");
require_once ('template-admin/header-admin.php');

// var_dump($_SESSION);


    if (isset($_GET["page"])) {
        $page = (int)$_GET["page"];
    }else {
        $page = 1;
    }

    // total pages car
    $carArticles = getCars($pdo, _ADMIN_CAR_PER_PAGE_, $page);
    $totalArticleCar = getTotalPageCar($pdo);
    $totalPageCar = ceil($totalArticleCar / _ADMIN_CAR_PER_PAGE_);

    // total pages service
    $serviceArticles = getServices($pdo, _ADMIN_SERVICE_PER_PAGE_, $page);
    $totalService = getTotalPageService($pdo);
    $totalPageService = ceil($totalService / _ADMIN_SERVICE_PER_PAGE_);

    // recupération des horaires
    $hourlys = getHourly($pdo);
?>


            <aside class="section-admin__crud">
                <div class="section-admin__crud__title">
                    <h2 class="title-h2"  id="articles">Articles</h2>
                    <div class="custom-button"><a href="./add-car.php">Ajouter un article</a></div>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__description">
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
                                    <td><a href="add-car.php?id=<?= $carArticle["car_id"] ?>">Modifier</a> | <a href="delete-car.php?id=<?=$carArticle["car_id"] ?>" id="delete">Supprimer</a></td>
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

                <div class="section-admin__crud__title">
                    <h2 class="title-h2"  id="horaires">Horaires</h2>
                    <div class="custom-button"><a href="./add-hourly.php">Ajouter une horaire</a></div>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__description">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Matin</th>
                                <th scope="col">Après-midi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($hourlys as $key => $hourly) {?>

                                <tr>
                                <th scope="row"><?= $hourly["hourly_id"] ?></th>
                                    <td><?= $hourly["name_day"] ?></td>
                                    <td><?= $hourly["hourly_am"] ?></td>
                                    <td><?= $hourly["hourly_pm"] ?></td>
                                    <td>Modifier | Supprimer</td>
                                </tr>
                                
                            <?php }  ?>

                        </tbody>
                    </table>
                </div>


                <div class="line-style"></div>

                <div class="section-admin__crud__title"  id="services">
                    <h2 class="title-h2">Services</h2>
                    <div class="custom-button"><a href="./add-service.php">Ajouter un service</a></div>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__description">
                    <table class="table ">
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
                                    <td>Modifier | <a href="delete-service.php?id=<?= $serviceArticle["service_id"] ?>">Supprimer</a></td>
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

                <div class="section-admin__crud__title"  id="moderation">
                    <h2 class="title-h2">Modération avis</h2>
                    <div class="custom-button"><a href="#">Ajouter un avis</a></div>
                </div>

                <div class="line-style"></div>

                <div class="section-admin__crud__description">
                    <table class="table ">
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
                                    <td>Modifier | Supprimer</td>
                                </tr>
                                
                            <?php }  ?>

                        </tbody>
                    </table>
                </div>

                <div class="copyright">
                    &#169;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    &#160;VP Garage.
                </div>

            </aside>

        </section>






        <script src="../js/script.js"></script>
        <script src="../js/lib/nav.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script>AOS.init();</script>
    </body>
</html>