<?php
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ('lib/car.php');
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

<section class="flux">

    <h2 class="title-h2">Filtres :</h2>

    <form>

        <fieldset class="form-filter">

            <div>
                <h3>Prix :</h3>
                <input type="text" name="price" id="price" class="select-form" placeholder="Entrer votre prix maximum" onkeyup="searchPrice()">
            </div>

            <div id="miles" class="select-form">
                <h3>Kilométrage :</h3>
                <label for="25000"><input type="checkbox" name="25000" id="25000"></input> 0 / 25.000</label>
                <label for="50000"><input type="checkbox" name="50000" id="50000"></input> 25.000 / 50.000</label>
                <label for="75000"><input type="checkbox" name="75000" id="75000"></input> 50.000/ 75.000</label>
                <label for="100000"><input type="checkbox" name="100000" id="100000"></input> 75.000/ 100.000</label>
                <label for="150000"><input type="checkbox" name="150000" id="150000"></input> 100.000/ 150.000</label>
                <label for="151000"><input type="checkbox" name="151000" id="151000"></input> 150.000 et plus</label>
            </div>

            <div id="years" class="select-form">
                <h3>Années :</h3>
                <label for="1978"><input type="checkbox" name="1980" id="1980"></input> 1980 et moins</label>
                <label for="1990"><input type="checkbox" name="1990" id="1990"></input> 1980 / 1990</label>
                <label for="2000"><input type="checkbox" name="2000" id="2000"></input> 1990 / 2000</label>
                <label for="2010"><input type="checkbox" name="2010" id="2010"></input> 2000 / 2010</label>
                <label for="2020"><input type="checkbox" name="2020" id="2020"></input> 2010 / 2020</label>
                <label for="2021"><input type="checkbox" name="2021" id="2021"></input> 2020 et plus</label>
            </div>



            
        </fieldset>
    </form>

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