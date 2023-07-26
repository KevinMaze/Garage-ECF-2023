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
    <title>VP-Garage</title>
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
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">Nos services</a></li>
                            <li><a href="#">Les occasions</a></li>
                            <li><a href="#">Contact / Avis</a></li>
                            <a href="/" class="custom-button">Connection</a>
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

        <header class="header__background">
            <div class="header__description flux">
                <img src="assets/logo_VP.png" alt="Logo VP Garage" class="aos-item" 
                    data-aos="fade-down"
                    data-aos-offset="0"
                    data-aos-delay="100"
                    data-aos-duration="1500"
                    data-aos-easing="ease-in-out"
                    data-aos-once="false">
                <h1 class="header__title aos-item" 
                    data-aos="fade-down"
                    data-aos-offset="0"
                    data-aos-delay="100"
                    data-aos-duration="1500"
                    data-aos-easing="ease-in-out"
                    data-aos-once="false">Garage Automobile</h1>

                <p class="header__para aos-item" 
                    data-aos="fade-up"
                    data-aos-offset="0"
                    data-aos-delay="50"
                    data-aos-duration="1500"
                    data-aos-easing="ease-in-out"
                    data-aos-once="false">Vincent Parrot, fort de ses 15 années d'expérience dans la réparation automobile, a ouvert 
                    son propre garage à Toulouse en 2021.
                    Depuis 2 ans, il propose une large gamme de services: réparation de la carrosserie et de la 
                    mécanique des voitures ainsi que leur entretien régulier pour garantir leur performance et 
                    leur sécurité.
                    Vincent Parrot considère son atelier comme un véritable lieu de confiance pour ses clients et 
                    leurs voitures doivent, selon lui, à tout prix être entre de bonnes mains.
                </p>
            </div>
        </header>

        <div class="line-style flux"></div>

        <section class="section__service flux">
            <h2 class="title-h2">Les services</h2>
            <div class="card-grid">
                <div class="card-service">
                    <div class="section__service__img">
                        <img src="./upload/services/amortisseurs.jpg" alt="#">
                    </div>
                    <p>Amortisseurs</p>
                </div>
                <div class="card-service">
                    <div class="section__service__img">
                        <img src="./upload/services/batterie.jpg" alt="#">
                    </div>
                    <p>Batterie</p>
                </div>
                <div class="card-service">
                    <div class="section__service__img">
                        <img src="./upload/services/bougie.jpg" alt="#">
                    </div>
                    <p>Bougies</p>
                </div>
                <div class="card-service">
                    <div class="section__service__img">
                        <img src="./upload/services/climatisation.jpg" alt="#">
                    </div>
                    <p>Climatisation</p>
                </div>
                <div class="card-service">
                    <div class="section__service__img">
                        <img src="./upload/services/courroie.jpg" alt="#">
                    </div>
                    <p>Courroie</p>
                </div>
                <div class="card-service">
                    <div class="section__service__img">
                        <img src="./upload/services/entretiens.jpg" alt="#">
                    </div>
                    <p>Entretiens</p>
                </div>
                <div class="card-service">
                    <div class="section__service__img">
                        <img src="./upload/services/frein.jpg" alt="#">
                    </div>
                    <p>Freins</p>
                </div>
                <div class="card-service">
                    <div class="section__service__img">
                        <img src="./upload/services/pneu.jpg" alt="#">
                    </div>
                    <p>Pneus</p>
                </div>
                <div class="card-service">
                    <div class="section__service__img">
                        <img src="./upload/services/vidange.jpg" alt="#">
                    </div>
                    <p>Vidange</p>
                </div>
            </div>
        </section>

        <div class="line-style flux"></div>

        <section class="carrousel-last-occasion">
            <h2 class="title-h2">Dernières Occasions</h2>
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner flux border-shadow">
                    <div class="carousel-item active">
                        <img src="./upload/cars/clio.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>CLIO</h3>
                            <p>20000 km | 2015 | 10000 €</p>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <img src="./upload/cars/clio.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="carrousel-title">CLIO</h3>
                            <p>20000 km | 2015 | 10000 €</p>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <img src="./upload/cars/clio.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>CLIO</h3>
                            <p>20000 km | 2015 | 10000 €</p>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <div class="line-style flux"></div>

        <section class="section__opinion flux">
            <h2 class="title-h2">Dernier avis</h2>
            <div class="section__last-opinion border-shadow">
                <h3>Name</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem voluptatum dolores iusto assumenda quibusdam repellendus rerum explicabo atque ipsum maxime incidunt aliquam tempore nulla dolor debitis similique vitae quae accusamus voluptate doloribus, omnis, optio alias quam quia. Fugit, incidunt consequatur.</p>
                <p class="section__opinion__note">Note : 5/5</p>
            </div>
        </section>

        <div class="line-style flux"></div>

        <footer class="flux">
            <div class="footer-grid">
                <div class="footer-grid-div border-div">
                    <h3>Horaires</h3>
                    <ul>
                        <li>Lun. : 08:45 - 12:00, 14:00 - 18h00</li>
                        <li>Mar. : 08:45 - 12:00, 14:00 - 18h00</li>
                        <li>Mer. : 08:45 - 12:00, 14:00 - 18h00</li>
                        <li>Jeu. : 08:45 - 12:00, 14:00 - 18h00</li>
                        <li>Ven. : 08:45 - 12:00, 14:00 - 18h00</li>
                        <li>Sam. : 08:45 - 12:00</li>
                        <li>Dim. : Fermé</li>
                    </ul>
                </div>
                <div  class="footer-grid-div border-div">
                    <h3>Contact</h3>
                    <ul>
                        <li>Téléphone : <a href="tel:+33606060606">0606060606</a></li>
                        <li>Adresse : TOULOUSE</li>
                        <li>Email : <a href="mailto : vincent@parrot.com">vincent@parrot.com</a></li>
                        <li><a href="#">Formulaire de contact</a></li>
                    </ul>
                </div>
                <div class="footer-grid-div">
                    <h3>Autres liens</h3>
                    <ul>
                        <li><a href="#">Conditions Générales</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Véhicules Occasions</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Avis Clients</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                    &#169;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    &#160;VP Garage.
                </div>
        </footer>



    

        <script src="./js/script.js"></script>
        <script src="./js/lib/nav.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script>AOS.init();</script>
    </body>
</html>