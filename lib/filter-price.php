<?php
require_once ('config.php');
require_once ('pdo.php');


    function selectCar(PDO $pdo, int $price, int $limit = null):array|bool
{
    $price = $_GET['price'];
    $sql = "SELECT * FROM image_car INNER JOIN car ON image_car.car_id = car.car_id WHERE price <= :price GROUP BY car.name " ;

    if($limit){
        $sql .= " LIMIT :limit";
    }
    $query = $pdo->prepare($sql);

    if($limit){
    $query->bindValue(":limit", $limit, PDO::PARAM_INT);
}

    $query->bindValue(":price", $price, PDO::PARAM_INT);
    
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode(selectCar($pdo, 1));
?>