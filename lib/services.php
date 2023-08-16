<?php 

// récupération de la table services
function getServices(PDO $pdo, int $limit = null):array
{
    $sql = "SELECT * FROM services ORDER BY name_service ASC";

    if ($limit){
        $sql .= " LIMIT :limit";
    }
    $query = $pdo->prepare($sql);

    if($limit){
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    $query->execute();
    $service = $query->fetchAll(PDO::FETCH_ASSOC);

    return $service;
};


?>