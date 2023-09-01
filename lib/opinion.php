<?php

// Envoie opinion par visiteur
function addOpinion(PDO $pdo, string $name, string $opinion_text, int $note):bool
{
    $query = $pdo->prepare("INSERT INTO opinion (name, opinion_text, note) VALUES (:name, :opinion_text, :note)");
    $query->bindValue(":name", $name, PDO::PARAM_STR);
    $query->bindValue(":opinion_text", $opinion_text, PDO::PARAM_STR);
    $query->bindValue(":note", $note, PDO::PARAM_STR);
    return $query->execute();
}

// récupération des avis
function getOpinions(PDO $pdo, int $limit = null, int $page = null):array|bool
{
    $sql = "SELECT * FROM opinion ORDER BY opinion_id DESC";

    if($limit && !$page){
        $sql .= " LIMIT :limit";
    }
    if($page){
        $sql .= " LIMIT :offset, :limit";
    }
    $query = $pdo->prepare($sql);

    if($limit){
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if($page){
        $offset = ($page -1) * $limit;
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }
    $query->execute();
    $opinion = $query->fetchAll(PDO::FETCH_ASSOC);
    return $opinion;
}

// récupération nb page
function getTotalOpinion(PDO $pdo):int
{
    $sql = "SELECT COUNT(*) FROM opinion";
    $query = $pdo->prepare($sql);
    $query->execute();
    $nbOpinion = $query->fetchAll(PDO::FETCH_ASSOC);
    return $nbOpinion["0"]["COUNT(*)"];
}

// récupération d'un opinion avec id
function getOpinionById(PDO $pdo, int $opinion_id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM opinion WHERE opinion_id = :id");
    $query->bindValue(":id", $opinion_id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

// supprimer un avis dans table opinion
function deleteOpinion(PDO $pdo, int $opinion_id):bool
{
    $query = $pdo->prepare("DELETE FROM opinion WHERE opinion_id = :id");
    $query->bindValue(':id', $opinion_id, PDO::PARAM_INT);
    $query->execute();

    if($query->rowCount() > 0){
        return true;
    }else{
        return false;
    }
}

// modération avis avec un "yes"
function addVerifyOpinion(PDO $pdo, string $name, string $opinion_text, int $note, string $verify, int $id):bool
{
    $query = $pdo->prepare("UPDATE opinion SET name = :name, opinion_text = :opinion_text, note = :note, verify = :verify WHERE opinion_id = :id");
    $query->bindValue(":name", $name, PDO::PARAM_STR);
    $query->bindValue(":opinion_text", $opinion_text, PDO::PARAM_STR);
    $query->bindValue(":note", $note, PDO::PARAM_STR);
    $query->bindValue(":verify", $verify, PDO::PARAM_STR);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    return $query->execute();
}
