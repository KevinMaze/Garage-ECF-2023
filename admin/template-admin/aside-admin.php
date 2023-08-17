<aside class="section-admin__nav">
    <div class="section-admin__nav__header">
        <img src="../assets/logo_VP.png" alt="Logo garage" class="witdh-logo">
        <p>Espace Administrateur</p>
    </div>

    <div class="line-inside-div-style"></div>

    <div class="section-admin__liste">
        <ul>
            <?php if ($_SESSION["user"]["role"] === "admin")  {?>
                <li><a href="../admin/index-admin.php">Accueil Administrateur</a></li>
                <li><a href="../admin/index-admin.php#articles">Articles</a></li>
                <li><a href="../admin/index-admin.php#horaires">Horaires</a></li>
                <li><a href="../admin/index-admin.php#services">Services</a></li>
                <li><a href="../admin/index-admin.php#moderation">Modération avis clients</a></li>
                <li><a href="#">Création de compte pro</a></li>
                <?php }elseif ($_SESSION["user"]["role"] === "employe"){?>
                <li><a href="../admin/index-admin.php">Accueil Administrateur</a></li>
                <li><a href="../admin/index-admin.php#articles">Articles</a></li>
                <li><a href="../admin/index-admin.php#services">Services</a></li>
                <li><a href="../admin/index-admin.php#moderation">Modération avis clients</a></li>
            <?php };?>
        </ul>
    </div>

    <div class="line-inside-div-style"></div>

    <div class="section-admin__footer">
        <img src="../assets/logo_VP.png" alt="#" class="witdh-logo">
        <p> <?= $_SESSION["user"]["lastname"]." ".$_SESSION["user"]["firstname"]?> </p>
        <div class="">
            <button type="button" class="dropdown-toggle dropdown-toggle-split button-group-admin" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
            <ul class="dropdown-menu button-group-admin__menu">
                <li><a href="../index.php">Retour à l'accueil</a></li>
                <li><a href="../deconnection.php">Déconnection</a></li>
            </ul>
        </div>
    </div>
</aside>