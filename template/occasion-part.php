<?php
    $image_car = selectImage($pdo, $car["car_id"], 1);
    
    foreach ($image_car as $key => $image) {
        if ($image_car == "") {
            $imagePath = "./assets/default.jpg";
        }
        else {
            $imagePath =".". _CAR_IMAGE_PATH_.$image["name_image"];
        }
    }

?>

<div class="section-occasion-card">
    <img src="<?= $imagePath ?>" alt="<?= $imagePath ?>">
    <div class="section-occasion__div">
        <h2 class="title-h2"><?= htmlentities($car["name"])?></h2>
        <p class="occasion-para">Kilométrage : <?= htmlentities($car["mileage"])?>.</p>
        <p class="occasion-para">Année : <?= htmlentities($car["year"])?>.</p>
        <p class="occasion-para">Prix : <?= htmlentities($car["price"])?> €</p>
        <a href="occasion-page.php?id=<?=$car['car_id']?>" class="custom-button">Voir l'annonce</a>
    </div>
</div>
