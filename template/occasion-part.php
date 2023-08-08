<div class="section-occasion-card">
    <img src="./upload/cars/<?= $image["car_id"]?>" alt="<?=htmlentities($car['name'])?>">
    <div class="section-occasion__div">
        <h2 class="title-h2"><?= htmlentities($car["name"])?> | <?= htmlentities($car["mileage"])?> km | <?= htmlentities($car["year"])?></h2>
        <p class="occasion-para"><?= htmlentities($car["description"])?>.</p>
    </div>
    <div class="occasion-price">
        <p class="occasion-para"><?= htmlentities($car["price"])?> €</p>
        <a href="occasion-page.php?id=<?=$key?>" class="custom-button">Voir l'annonce</a>
    </div>
</div>


<!-- ajout htmlentities() -->
<!-- episode 6 39:26 -->