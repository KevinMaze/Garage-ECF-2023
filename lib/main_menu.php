<?php 

//Défini dynamiquement les titres et métadonnées de chaque page
// flase dans navbar // true pas dans navbar
    $mainMenu = [
        "index.php" =>["title" => "Accueil", "head_title" => "VP Garage" ,"meta-description" => "Vincent Parrot, fort de ses 15 années d'expérience dans la réparation automobile, a ouvert 
        son propre garage à Toulouse en 2021.
        Depuis 2 ans, il propose une large gamme de services: réparation de la carrosserie et de la 
        mécanique des voitures ainsi que leur entretien régulier pour garantir leur performance et 
        leur sécurité. Vincent Parrot considère son atelier comme un véritable lieu de confiance pour ses clients et leurs voitures doivent, selon lui, à tout prix être entre de bonnes mains.", "exclude" => false],

        "service.php" =>["title" => "Nos services","head_title" => "VP Garage - Les services" , "meta-description" => "Vous recherchez un garagiste compétent, efficace et à l'écoute des besoins de votre auto ? Vincent Parrot et ses mécaniciens mettent toutes leurs compétences et leurs expertises pour entretenir et réparer votre véhicule. Que ce soit pour un gonflage pneu, vidange, révision voiture, changement plaquettes de frein, recharge clim, montage attelage, diagnostic automobile...chaques mécaniciens expert y répondra avec un seul mot d'ordre, votre satisfaction. Découvrez nos prestations entretiens et réparations auto.", "exclude" => false],

        "occasion.php" =>["title" => "Les occasions", "head_title" => "VP Garage - Les occasions" , "meta-description" => "Vous trouverez ici tous les véhicules d'occasions proposés par le garage Vincet Parrot", "exclude" => false],

        "occasion-page.php" =>["title" => "Les occasions", "head_title" => "VP Garage - Les occasions" , "meta-description" => "Voiture d'occasion", "exclude" => true],

        
        "contact.php" =>["title" => "Contact / Avis", "head_title" => "VP Garage - Les contacts" , "meta-description" => "Vous trouverez ici le formulaire de contact et le formulaire d'avis.", "exclude" => false],

        "connection.php" =>["title" => "Expace connection", "head_title" => "VP Garage - Connection", "meta-description" => "Connection", "exclude" => true],

        "index-admin.php" =>["title" => "", "head_title" => "VP Garage - Administration", "meta-description" => "", "exclude" => true],

        "mention.php" =>["title" => "Mentions légales", "head_title" => "VP Garage - Mentions légales", "meta-description" => "Mentions légales", "exclude" => true],
    ];

?>