<?php 

// récupération de la table services
function getServices(PDO $pdo, int $limit = null, int $page = null):array
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

// Récupération nb de page services
function getTotalPageService(PDO $pdo):int
{
    
    $sql = "SELECT COUNT(*) FROM services";
    $query = $pdo->prepare($sql);
    $query->execute();
    $nbPageService = $query->fetchAll(PDO::FETCH_ASSOC);
    return $nbPageService["0"]["COUNT(*)"];
}

// Requète insertion service
function addService (PDO $pdo, string $name_service, string $description, string|null $image_service, int $id = null):bool
{
    if($id === null){
        $query = $pdo->prepare("INSERT INTO services (name_service, description, image_service) VALUES (:name_service, :description, :image_service)");
    }else{
        $query = $pdo->prepare("UPDATE 'service' SET 'name_service' = ':name_service' , 'description' = ':description', 'image_service' = ':image_service', ''id' = ':id'");
        $query->bindValue(':id',$id, $pdo::PARAM_INT);
    }

    $query->bindValue(":name_service", $name_service, PDO::PARAM_STR);
    $query->bindValue(":description", $description, PDO::PARAM_STR);
    $query->bindValue(":image_service", $image_service, PDO::PARAM_STR);

    return $query->execute();
}


?>