<?php
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ('lib/car.php');
    // require_once ('lib/filter.php');
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

<section class="flux filtre">

    <h2 class="title-h2">Filtres :</h2>

    <form action="" class="form-filter">

        <div id="price" class="form-select">
            <h3>Prix :</h3>
            <label for="2000"><input type="checkbox" id="2000"></input> 0 € / 2 000 €</label>
            <label for="4000"><input type="checkbox" id="4000" name="4000"></input> 2 000 € / 4 000 €</label>
            <label for="6000"><input type="checkbox" id="6000"></input> 4 000 € / 6 000 €</label>
            <label for="8000"><input type="checkbox" id="8000"></input> 6 000 € / 8 000 €</label>
            <label for="10000"><input type="checkbox" id="10000"></input> 8 000 € / 10 000 €</label>
            <label for="10001"><input type="checkbox" id="10001"></input> 10 000 € et plus</label>
        </div>
    
        <div id="miles" class="form-select">
            <h3>Kilométrage :</h3>
            <label for="25000"><input type="checkbox" id="25000"></input> 0 / 25 000</label>
            <label for="50000"><input type="checkbox" id="50000"></input> 26 000 / 50 000</label>
            <label for="75000"><input type="checkbox" id="75000"></input> 51 000/ 75 000</label>
            <label for="100000"><input type="checkbox" id="100000"></input> 76 000/ 100 000</label>
            <label for="150000"><input type="checkbox" id="150000"></input> 101 000/ 150 000</label>
            <label for="151000"><input type="checkbox" id="151000"></input> 151 000 et plus</label>
        </div>
    
        <div id="years" class="form-select">
            <h3>Années :</h3>
            <label for="1978"><input type="checkbox" id="1978"></input> 1980 et moins</label>
            <label for="1990"><input type="checkbox" id="1990"></input> 1981 / 1990</label>
            <label for="2000"><input type="checkbox" id="2000"></input> 1991 / 2000</label>
            <label for="2010"><input type="checkbox" id="2010"></input> 2001 / 2010</label>
            <label for="2020"><input type="checkbox" id="2020"></input> 2011 / 2020</label>
            <label for="2021"><input type="checkbox" id="2021"></input> 2021 et plus</label>
        </div>

    </form>

</section>

<div class="line-style flux"></div>

<div class="filter"></div>

<section class="section-occasion flux">

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