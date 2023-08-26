// pages à faire :
<!-- - horaires + bdd horaires -> requete et changement dans back office -->
- avis clients + bdd avis + page delete avis -> validation en back office, création note avis client en étoile /5 ?, 
- page de création de compte employer et de suppression (table users deja créé)


// fonction a integrer
- requete de suppression images add car, suppriemr image table car -> requete table image_car
<!-- - requete de suppresion d'article service, add service -->



// bug a corriger 
<!-- - tout les chemins des images -->
<!-- - messages [] et errors [] dans add service/ add car et delete car (div bugger) -->
- image qui ne s'enregistre pas en bdd sur add car
<!-- - voir page de modification services -->
- voir page de modification voitures
- image carrousel bug
- regarder la taille des fichier envoyer





// alimentation bdd
- ajout de plusieur véhicules en bdd
- ajout de plusieurs avis clients

________________________________________________________________________________

    $fileName1 = null;
    $fileName2 = null;
    $fileName3 = null;
    $fileName4 = null;
    if (isset($_FILES["file1"]["tmp_name"]) && ($_FILES["file1"]["tmp_name"] != "")){
        $checkImage = getimagesize($_FILES["file1"]["tmp_name"]);
        // si image alors ok
        if ($checkImage != false) {
            $fileName1 = slugify(basename($_FILES["file1"]["name"]));
            $fileName1 = uniqid()."-".$fileName1;
            // On déplace le fichier dans upload/car
            move_uploaded_file($_FILES["file1"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName1);
        }else { 
            //sinon
            $errors[] = "Fichier non conforme";
        }
    }
    if (isset($_FILES["file2"]["tmp_name"]) && ($_FILES["file2"]["tmp_name"] != "")){
        $checkImage = getimagesize($_FILES["file2"]["tmp_name"]);

        // si image alors ok
        if ($checkImage != false) {
            $fileName2 = slugify(basename($_FILES["file2"]["name"]));
            $fileName2 = uniqid()."-".$fileName2;
            // On déplace le fichier dans upload/car
            move_uploaded_file($_FILES["file2"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName2);
        }else { 
            //sinon
            $errors[] = "Fichier non conforme";
        }
    }
    if (isset($_FILES["file3"]["tmp_name"]) && ($_FILES["file3"]["tmp_name"] != "")){
        $checkImage = getimagesize($_FILES["file3"]["tmp_name"]);

        // si image alors ok
        if ($checkImage != false) {
            $fileName2 = slugify(basename($_FILES["file3"]["name"]));
            $fileName2 = uniqid()."-".$fileName3;
            // On déplace le fichier dans upload/car
            move_uploaded_file($_FILES["file3"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName3);
        }else { 
            //sinon
            $errors[] = "Fichier non conforme";
        }
    }
    if (isset($_FILES["file4"]["tmp_name"]) && ($_FILES["file4"]["tmp_name"] != "")){
        $checkImage = getimagesize($_FILES["file4"]["tmp_name"]);

        // si image alors ok
        if ($checkImage != false) {
            $fileName2 = slugify(basename($_FILES["file4"]["name"]));
            $fileName2 = uniqid()."-".$fileName4;
            // On déplace le fichier dans upload/car
            move_uploaded_file($_FILES["file4"]["tmp_name"], dirname(__DIR__)._CAR_IMAGE_PATH_.$fileName4);
        }else { 
            //sinon
            $errors[] = "Fichier non conforme";
        }
    }
