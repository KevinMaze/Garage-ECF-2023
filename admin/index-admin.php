<?php  

    require_once ("../lib/session.php");
    require_once ("../lib/config.php");
    require_once ("../lib/pdo.php");
    require_once ('template-admin/header-admin.php');

?>


    <aside class="section-admin__crud flux">

        <h2 class="title-h2">Page d'acceuil</h2>

        <div class="line-style"></div>

        <div class="flux">
            <p class="section-admin__crud__description">Bienvenue sur votre page d'administrateur</p>
        </div>

        <div class="line-style"></div>

        <div class="copyright">
            &#169;
                <script>
                    document.write(new Date().getFullYear());
                </script>
            &#160;VP Garage.
        </div>

    </aside>

<?php require_once ("template-admin/footer-admin.php") ?>