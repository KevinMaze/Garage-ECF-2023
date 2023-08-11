<?php
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ('lib/car.php');
    require_once ('lib/main_menu.php');
    require_once ('template/header.php');

    
    $cars = getCars($pdo);
?>

<div class="line-style flux"></div>

<section class="flux filtre">

    <h2 class="title-h2">Filtres :</h2>

    <form action="" class="form-filter">
        <label for="price" id="price">
            <select name="price" id="price-select" class="form-select">
                <option value="0" selected>Prix</option>
                <option value="1">0 € / 1 999 €</option>
                <option value="2">2 000 € / 3 999 €</option>
                <option value="3">4 000 € / 5 999 €</option>
                <option value="4">6 000 € / 7 999 €</option>
                <option value="5">8 000 € / 9 999 €</option>
                <option value="6">10 000 € et plus</option>
            </select>
        </label>
    
        <label for="miles">
            <select name="miles" id="miles-select" class="form-select">
                <option value="0" selected>Kilométrage</option>
                <option value="1">0 / 25 000</option>
                <option value="2">26 000 / 50 000</option>
                <option value="3">51 000/ 75 000</option>
                <option value="4">76 000/ 100 000</option>
                <option value="5">101 000/ 150 000</option>
                <option value="6">151 000 et plus</option>
            </select>
        </label>
    
        <label for="years">
            <select name="years" id="years-select" class="form-select">
                <option value="0" selected>Années</option>
                <option value="1">1978 et moins</option>
                <option value="2">1979 / 1990</option>
                <option value="3">1991 / 2000</option>
                <option value="4">2001 / 2010</option>
                <option value="5">2011 / 2020</option>
                <option value="6">2021 et plus</option>
            </select>
        </label>
    </form>

</section>

<div class="line-style flux"></div>

<section class="section-occasion flux">

    <?php foreach ($cars as $key => $car) {?>

        <?php include ("template/occasion-part.php") ?>
        
    <?php }  ?>

    
</section>

<div class="line-style flux"></div>

<?php 
require_once ('template/footer.php')
?>