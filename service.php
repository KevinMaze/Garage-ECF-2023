<?php 
require_once ('lib/config.php');
require_once ('lib/pdo.php');
require_once ('lib/services.php');
require_once ('lib/main_menu.php');
require_once ('template/header.php');

$services = getServices($pdo);
?>

<div class="line-style flux"></div>

<section class="flux">

    <h2 class="title-h2">Nos Services</h2>

    <div class="flux">
    <?php  foreach ($services as $key => $service) {?>

        <?php require ('template/service-part.php')  ?>
        
    <?php } ?>
    </div>
</section>

<div class="line-style flux"></div>

<?php  
require_once ('template/footer.php')
?>