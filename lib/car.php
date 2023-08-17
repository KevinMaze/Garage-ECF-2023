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

