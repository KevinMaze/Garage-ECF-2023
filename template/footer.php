<footer class="flux">
            <div class="footer-grid">
                <div class="footer-grid-div border-div">
                    <h3>Horaires</h3>
                    <ul>
                        <?php foreach ($hourlys as $key => $hourly) {?>
                        <li><?= $hourly["name_day"] ?> : <?= $hourly["hourly_am"] ?> | <?= $hourly["hourly_pm"] ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div  class="footer-grid-div border-div">
                    <h3>Contact</h3>
                    <ul>
                        <li>Téléphone : <a href="tel:+33606060606">0606060606</a></li>
                        <li>Adresse : TOULOUSE</li>
                        <li>Email : <a href="mailto : kekeproject@hotmail.fr">vincent@parrot.com</a></li>
                        <li><a href="#">Formulaire de contact</a></li>
                    </ul>
                </div>
                <div class="footer-grid-div">
                    <h3>Autres liens</h3>
                    <ul>
                        <li><a href="#">Mentions Légales</a></li>
                        <li><a href="./service.php">Services</a></li>
                        <li><a href="./occasion.php">Véhicules Occasions</a></li>
                        <li><a href="./contact.php">Contact</a></li>
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



    
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="./js/script.js"></script>
        <script src="./js/lib/nav.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script>AOS.init();</script>
    </body>
</html>