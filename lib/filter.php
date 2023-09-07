<?php

function getAllCar(PDO $pdo):array|bool
{
    $query = $pdo->prepare("SELECT * FROM car ORDER BY car_id DESC");
    $query->execute();
    $allCar = $query->fetchAll(PDO::FETCH_ASSOC);
    return $allCar;
}