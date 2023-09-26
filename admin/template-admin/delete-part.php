<section class="flux">

    <div class="line-style flux"></div>

    <h2 class="title-h2">Page de suppression</h2>
    <?php foreach ($messages as $message) { ?>
        <div class="alert alert-success">
        <?= $message ?>
        </div>
    <?php }?>

    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-danger">
        <?= $error ?>
        </div>
    <?php }?>

    <div class="line-style"></div>

</section>