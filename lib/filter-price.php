<?php
require_once ('config.php');
$price = $_GET['price'];
require_once ('pdo.php');

    
if($price == "") {
    $query = $pdo->prepare("SELECT * FROM car");
    $query->execute();
    $resp = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resp);
}else{
    $query = $pdo->prepare("SELECT * FROM car WHERE price <= :price");
    $query->execute(array(":price" => $price));
    $resp = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resp);
}






?>