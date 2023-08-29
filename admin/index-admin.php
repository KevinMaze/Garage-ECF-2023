<?php  

require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/user.php");
require_once ("../lib/car.php");
require_once ("../lib/services.php");
require_once ("../lib/hourly.php");
require_once ('template-admin/header-admin.php');

    if (isset($_GET["page"])) {
        $page = (int)$_GET["page"];
    }else {
        $page = 1;
    }
?>


    <aside class="section-admin__crud">

        <h2 class="title-h2">Page d'acceuil</h2>

        <div class="line-style"></div>

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