<?php
    if ($image['name'] === null) {
        $imagePath = "assets/default.jpg";
    }
    else {
        $imagePath = "./upload/cars/".$image_car["name"];
    }
?>

<div class="section-occasion-card">
    <img src="<?=$imagePath?>" alt="#>">
    <div class="section-occasion__div">
        <h2 class="title-h2"><?= htmlentities($car["name"])?> | <?= htmlentities($car["mileage"])?> km | <?= htmlentities($car["year"])?></h2>
        <p class="occasion-para"><?= htmlentities($car["description"])?>.</p>
    </div>
    <div class="occasion-price">
        <p class="occasion-para"><?= htmlentities($car["price"])?> €</p>
        <a href="occasion-page.php?id=<?=$car['car_id']?>" class="custom-button">Voir l'annonce</a>
    </div>
</div>


<!-- ajout htmlentities() -->
<!-- episode 6 39:26 -->