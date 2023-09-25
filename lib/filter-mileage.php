<?php
require_once ('config.php');
$mileage = $_GET['mileage'];
require_once ('pdo.php');

    

    $query = $pdo->prepare("SELECT * FROM car WHERE mileage <= :mileage");
    $query->execute(array(":mileage" => $mileage));
    $resp = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resp);


?>