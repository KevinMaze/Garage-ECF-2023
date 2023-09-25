<?php
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ('lib/car.php');
    // require_once ('lib/filter-price.php');
    require_once ('lib/main_menu.php');
    require_once ('template/header.php');

    if (isset($_GET["page"])) {
        $page = (int)$_GET["page"];
    }else {
        $page = 1;
    }

    $cars = getCars($pdo, _ADMIN_CAR_PER_PAGE_, $page);
    $totalArticleCar = getTotalPageCar($pdo);
    $totalPageCar = ceil($totalArticleCar / _ADMIN_CAR_PER_PAGE_);

?>

<div class="line-style flux"></div>

<section class="flux section-filter">
    <h2 class="title-h2">Filtres : </h2>
    <form>
        <fieldset class="form-filter">
            <div>
                <h3>Prix :</h3>
                <input type="text" name="price" id="price" class="input-form" placeholder="Prix maximum" onkeyup="searchPrice()">
            </div>

            <div>
                <h3>Kilométrage :</h3>
                <input type="text" name="price" id="price" class="input-form" placeholder="Kilométrage maximum" onkeyup="searchMileage()">
            </div>

            <div>
                <h3>Année :</h3>
                <input type="text" name="price" id="price" class="input-form" placeholder="Année maximum" onkeyup="searchYear()">
            </div>
        </fieldset>
    </form>
    <button class="custom-button button-filter-reload" id="reload">Reload</button>
</section>

<div class="line-style flux"></div>

<div class="filter"></div>

<section class="section-occasion flux" id="response">
    

    <?php foreach ($cars as $key => $car){?>
        
        <?php include ("template/occasion-part.php") ?>
        
    <?php }  ?>


        

</section>

<div class="flux occasion_paging">
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



<div class="line-style flux"></div>

<script src="./js/lib/filter.js" async></script>
<?php 
require_once ('template/footer.php')
?>