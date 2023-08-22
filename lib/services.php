<?php 

// récupération d'un post aservice avec id
function getServiceById(PDO $pdo, int $id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM services WHERE service_id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

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
function addService (PDO $pdo, string $name_service, string $description, string|null $image_service, int $user_id, int $id = null):bool
{
    if($id === null){
        
        $query = $pdo->prepare("INSERT INTO 'services' ('name_service', 'description', 'image_service', 'user_id') VALUES (':name_service', ':description', ':image_service', ':user_id')");
    }else{
        $query = $pdo->prepare("UPDATE 'service' SET 'name_service' = ':name_service' , 'description' = ':description', 'image_service' = ':image_service', 'user_id' = ':user_id' ''id' = ':id'");
        $query->bindValue(':id',$id, $pdo::PARAM_INT);
    }

    $query->bindValue(":name_service", $name_service, PDO::PARAM_STR);
    $query->bindValue(":description", $description, PDO::PARAM_STR);
    $query->bindValue(":image_service", $image_service, PDO::PARAM_STR);
    $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);

    return $query->execute();
}

// Suppression du post service avec id
function deleteService(PDO $pdo, int $id):bool 
{
    $query = $pdo->prepare("DELETE FROM services WHERE service_id = :id");
    $query-> bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    if($query->rowCount() > 0){
        return true;
    }else{
        return false;
    }
}


?>