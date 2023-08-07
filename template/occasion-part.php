<div class="section-occasion-card">
    <img src="./upload/cars/clio.jpg" alt="">
    <div class="section-occasion__div">
        <h2 class="title-h2"><?= $car["title"]  ?></h2>
        <p class="occasion-para"><?= $car["description"] ?>.</p>
    </div>
    <div class="occasion-price">
        <p class="occasion-para"><?= $car["price"]  ?></p>
        <a href="occasion-page.php?id=<?=$key?>" class="custom-button">Voir l'annonce</a>
    </div>
</div>