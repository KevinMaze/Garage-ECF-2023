<div class="service-php " id="<?=$service["name_service"]?>">
    <div class="service-img">
        <img src=".<?=_SERVICE_IMG_PATH_.$service["image_service"];?>" alt=<?= $service["name_service"] ?>>
        <h3> <?= $service["name_service"]?> </h3>
    </div>
    <div class="description-service">
        <!-- nl2br permet un saut de ligne ou utilisation explode(PHP_EOL, $service["description"]) -->
        <p><?= nl2br($service["description"])?></p>
    </div>
</div>