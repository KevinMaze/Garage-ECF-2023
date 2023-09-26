<?php
require_once ('config.php');
require_once ('pdo.php');

function selectYear(PDO $pdo, int $price, int $limit = null):array|bool
{
    $year = $_GET['year'];
    $sql = "SELECT * FROM image_car INNER JOIN car ON image_car.car_id = car.car_id WHERE year <= :year GROUP BY car.name " ;

    if($limit){
        $sql .= " LIMIT :limit";
    }
    $query = $pdo->prepare($sql);

    if($limit){
    $query->bindValue(":limit", $limit, PDO::PARAM_INT);
}

    $query->bindValue(":year", $year, PDO::PARAM_INT);
    
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode(selectYear($pdo, 1));
?>