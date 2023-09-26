<?php
require_once ('config.php');
require_once ('pdo.php');


function selectMileage(PDO $pdo, int $price, int $limit = null):array|bool
{
    $mileage = $_GET['mileage'];
    $sql = "SELECT * FROM image_car INNER JOIN car ON image_car.car_id = car.car_id WHERE mileage <= :mileage GROUP BY car.name " ;

    if($limit){
        $sql .= " LIMIT :limit";
    }
    $query = $pdo->prepare($sql);

    if($limit){
    $query->bindValue(":limit", $limit, PDO::PARAM_INT);
}

    $query->bindValue(":mileage", $mileage, PDO::PARAM_INT);
    
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode(selectMileage($pdo, 1));
?>