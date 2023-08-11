<?php

// récupération de la table car
function getCars(PDO $pdo):array|bool
{
    
    $sql = "SELECT * FROM car ORDER BY car_id DESC";
    $query = $pdo->prepare($sql);
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

