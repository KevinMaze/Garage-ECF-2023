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
function getOpinions(PDO $pdo):array|bool
{
    $sql = "SELECT * FROM opinion ORDER BY opinion_id DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    $opinion = $query->fetchAll(PDO::FETCH_ASSOC);
    return $opinion;
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

// ajout d'un avis vérifié
function addVerifyOpinion(PDO $pdo, string $name_verify, string $opinion_text_verify, int $note_verify, string $verify):bool
{
    $query = $pdo->prepare("UPDATE opinion (name, opinion_text, note, verify) VALUES (:name_verify, :opinion_text :note, :verify)");
    $query->bindValue(":name", $name_verify, PDO::PARAM_STR);
    $query->bindValue(":opinion_text", $opinion_text_verify, PDO::PARAM_STR);
    $query->bindValue(":note", $note_verify, PDO::PARAM_STR);
    $query->bindValue(":verify", $verify, PDO::PARAM_INT);
    return $query->execute();
}

// récupération avis vérifié
