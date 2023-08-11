<?php
require_once ('lib/main_menu.php');
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/lib/nav.css">
    <link rel="stylesheet" href="./css/lib/button.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:wght@100;200;300;400;500;600;700;800;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/logo_VP.png" type="image/png">
    <title><?=$mainMenu[$currentPage]["head_title"]?></title>
</head>

    <body>

        <nav>
            <aside id="sidebar">
                <div class="sidebar_content sidebar_head">
                    <h1 class="sidebar__title">VP Garage</h1>
                </div>

                <div class="line"></div>

                <div class="sidebar_content sidebar_body">
                    <nav class="side_navlinks">
                        <ul>
                            <?php foreach ($mainMenu as $key => $menuItem) {
                                if($menuItem["exclude"] == false){
                                ?>
                                <li><a href=<?= $key ?>><?= $menuItem["title"] ?></a></li>
                            <?php }
                            } 
                            ?> 
                            <a href="connection.php" class="custom-button">Connection</a>

                        </ul>

                    </nav>
                </div>

                <div class="line"></div>

                <div class="sidebar_content sidebar_foot">
                    <p>
                    &#169;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        &#160;VP Garage.
                    </p>
                </div>
            </aside>


            <div class="sidebar_toggler">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

        <header class="header__background ">

            <div class="header__description__connection flux">
                <img src="assets/logo_VP.png" alt="Logo VP Garage">
                <h1 class="header__title">Espace Connection</h1>
            </div>

            <div class="line-style flux"></div>

            <form action="" method="post" class="form-style-connection flux">
            
                <label for="email" class="label-connection"> Login</label>
                <input type="text" id="email"  class="form-input">

                <label for="password" class="label-connection"> Mot de passe</label>
                <input type="text" id="password" class="form-input">

                <div class="form-button">
                    <input type="submit" value="Connection" class="custom-button">
                </div>
            
                <p> &#169;<script>document.write(new Date().getFullYear());</script>&#160;VP Garage.
                </p>
            </form>

                    
        </header>

        <script src="./js/script.js"></script>
        <script src="./js/lib/nav.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script>AOS.init();</script>
    </body>
</html>