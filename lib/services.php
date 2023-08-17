<?php 

// récupération de la table services
function getServices(PDO $pdo, int $limit = null, $page = null):array
{
    $sql = "SELECT * FROM services ORDER BY name_service ASC";

    if ($limit && !$page){
        $sql .= " LIMIT :limit";
    }
    if ($page) {
        $sql .= " LIMIT :offset, :limit";
    }

    $query = $pdo->prepare($sql);

    if($limit){
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if($page){
        $offset = ($page - 1) * $limit;
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

    $query->execute();
    $service = $query->fetchAll(PDO::FETCH_ASSOC);

    return $service;
};


?>