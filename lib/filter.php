<?php
require_once ('config.php');
require_once ('pdo.php');

function getCar(PDO $pdo){
    $query = $pdo->prepare("SELECT * FROM car");
    $query->execute();
    $cars = $query->fetchAll(PDO::FETCH_ASSOC);
    return $cars;
}

echo json_encode(getCar($pdo));

