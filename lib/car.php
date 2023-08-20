<?php

// récupération de la table car
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


// récupération d'une voiture avec son id
function getCar(PDO $pdo, int $id):array|bool
{
    
    $sql = "SELECT * FROM car WHERE car_id = :id";
    $query = $pdo->prepare($sql);

    $query->bindValue(":id", $id, PDO::PARAM_INT);

    $query->execute();
    $car = $query->fetch(PDO::FETCH_ASSOC);

    return $car;
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
function addCar(PDO $pdo, string $name, string $description, float $price, int $mileage, int $year, string|null $image1, string|null $image2, string|null $image3, string|null $image4, int $id = null):bool
{
    if ($id === null) {
        $query = $pdo->prepare("INSERT INTO car (name, description, price, mileage, year, image1, image2, image3, image4) VALUES (:name, :description, :price, :mileage, :year, :image1 ,:image2, :image3, :image4)");
    }else{
        $query = $pdo->prepare("UPDATE 'car' SET 'name' = ':name', 'description' = ':description', 'price' = ':price', 'mileage' = ':mileage', 'year' = ':year', 'image1' = ':image1', 'image2' = ':image2', 'image3' = ':image3', 'image4' = ':image4', 'id' = ':id'");
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
    }

    $query->bindValue(":name", $name, PDO::PARAM_STR);
    $query->bindValue(":description", $description, PDO::PARAM_STR);
    $query->bindValue(":price", $price, PDO::PARAM_INT);
    $query->bindValue(":mileage", $mileage, PDO::PARAM_INT);
    $query->bindValue(":year", $year, PDO::PARAM_INT);
    $query->bindValue(":image1", $image1, PDO::PARAM_STR);
    $query->bindValue(":image2", $image2, PDO::PARAM_STR);
    $query->bindValue(":image3", $image3, PDO::PARAM_STR);
    $query->bindValue(":image4", $image4, PDO::PARAM_STR);

    return $query->execute();

}
