<?php
require_once ('config.php');
$price = $_GET['price'];
require_once ('pdo.php');

    

    $query = $pdo->prepare("SELECT * FROM car WHERE price <= :price");
    $query->execute(array(":price" => $price));
    $resp = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resp);

?>