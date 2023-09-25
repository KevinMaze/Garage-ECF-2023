<?php
require_once ('config.php');
$year = $_GET['year'];
require_once ('pdo.php');

    

    $query = $pdo->prepare("SELECT * FROM car WHERE year <= :year");
    $query->execute(array(":year" => $year));
    $resp = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resp);


?>