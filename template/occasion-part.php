<?php
    $image_car = selectImage($pdo, $car["car_id"], 1);
    
    if ($image_car == "") {
        $imagePath = "./assets/default.jpg";
    }
    else {
        $imagePath = "."._CAR_IMAGE_PATH_.$image_car["name_image"];
    }
?>

<div class="section-occasion-card">
    <img src="<?= $imagePath ?>" alt="<?= $imagePath ?>">
    <div class="section-occasion__div">
        <h2 class="title-h2"><?= htmlentities($car["name"])?> | <?= htmlentities($car["mileage"])?> km | <?= htmlentities($car["year"])?></h2>
        <p class="occasion-para"><?= htmlentities($car["description"])?>.</p>
    </div>
    <div class="occasion-price">
        <p class="occasion-para"><?= htmlentities($car["price"])?> €</p>
        <a href="occasion-page.php?id=<?=$car['car_id']?>" class="custom-button">Voir l'annonce</a>
    </div>
</div>