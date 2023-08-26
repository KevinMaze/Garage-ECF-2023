<?php
// Récupération d'une seule colonne car en fonction de l'id
function getCarById(PDO $pdo, int $id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM car WHERE car_id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}



// récupération de la table car (avec limit et pagination)
function getCars(PDO $pdo, int $limit = null, int $page = null):array
{
    $sql = "SELECT * FROM car ORDER BY car_id DESC";

    if ($limit && !$page){
        $sql .= " LIMIT :limit";
    }
    if ($page) {
        $sql .= " LIMIT :offset, :limit";
    }

    $query = $pdo->prepare($sql);

    if($limit){
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if($page){
        $offset = ($page - 1) * $limit;
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

    $query->execute();
    $cars = $query->fetchAll(PDO::FETCH_ASSOC);

    return $cars;
}

// Récupération nb de page car
function getTotalPageCar(PDO $pdo):int
{
    
    $sql = "SELECT COUNT(*) FROM car";
    $query = $pdo->prepare($sql);
    $query->execute();
    $nbPageCar = $query->fetchAll(PDO::FETCH_ASSOC);
    return $nbPageCar["0"]["COUNT(*)"];
}

// ajouter un article car (requète d'insertion)
function addCar(PDO $pdo, string $name, string $description, float $price, int $mileage, int $year):bool|int
{
    $query = $pdo->prepare("INSERT INTO car (name, description, price, mileage, year) VALUES (:name, :description, :price, :mileage, :year)");

    $query->bindValue(":name", $name, PDO::PARAM_STR);
    $query->bindValue(":description", $description, PDO::PARAM_STR);
    $query->bindValue(":price", $price, PDO::PARAM_INT);
    $query->bindValue(":mileage", $mileage, PDO::PARAM_INT);
    $query->bindValue(":year", $year, PDO::PARAM_INT);
    $query->execute();
    $car_id = $pdo->lastInsertId();

    return $car_id;
    
}

// Requète ajout image avec car_id
function addImageCar(PDO $pdo, string $name_image, int $car_id):bool
{
    $query = $pdo->prepare("INSERT INTO image_car (name_image, car_id) VALUES (:name_image, :car_id)");

    $query->bindValue(":name_image", $name_image, PDO::PARAM_STR);
    $query->bindValue(":car_id", $car_id, PDO::PARAM_INT);

    return $query->execute();
}

// Selection des images de la table image_car avec car_id
function selectImageCar(PDO $pdo):array|bool
{
    $query = $pdo->prepare("SELECT * FROM image_car INNER JOIN car ON image_car.card_id = car.car_id");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Suppression de l'article car
function deleteCar(PDO $pdo, int $id):bool 
{
    $query = $pdo->prepare("DELETE FROM car WHERE car_id = :id");
    $query-> bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    if($query->rowCount() > 0){
        return true;
    }else{
        return false;
    }
}