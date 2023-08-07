<?php 
require_once ('lib/main_menu.php');
require_once ('template/header.php');
require_once ('lib/config.php');
require_once ('lib/services.php')
?>

<div class="line-style flux"></div>

<section class="flux">
    <h2 class="title-h2">Nos Services</h2>

    <div class="flux">
    <?php  foreach ($service as $key => $service) {?>
        <div class="service-php ">
            <div class="service-img">
                <img src=<?= _SERVICE_IMG_PATH_.$service["image"]?> alt="">
                <h3> <?= $service["title"]?> </h3>
            </div>
            <div class="description-service">
                <p><?= $service["description"]?></p>
            </div>
        </div>
    <?php } ?>
    </div>
</section>

<div class="line-style flux"></div>

<?php  
require_once ('template/footer.php')
?>