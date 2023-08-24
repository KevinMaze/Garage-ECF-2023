<?php
// Récupération des horaires de la table hourly
function getHourly(PDO $pdo):array
{
    $sql = "SELECT * FROM hourly";
    $query = $pdo->prepare($sql);
    $query->execute();
    $hourly = $query->fetchAll(PDO::FETCH_ASSOC);

    return $hourly;

}

// Récupération hourly avec id
function getHourlyById(PDO $pdo, int $id):array|bool
{
    $sql = "SELECT * FROM hourly WHERE hourly_id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $hourly = $query->fetch(PDO::FETCH_ASSOC);

    return $hourly;

}


// Requète d'ajout horaires
function addHourly(PDO $pdo, string $name_day, string $hourly_am, string $hourly_pm):bool
{
    $query = $pdo->prepare("INSERT INTO hourly (name_day, hourly_am, hourly_pm) VALUES (:name_day, :hourly_am, :hourly_pm)");

    $query->bindValue(":name_day", $name_day, PDO::PARAM_STR);
    $query->bindValue(":hourly_am", $hourly_am, PDO::PARAM_STR);
    $query->bindValue(":hourly_pm", $hourly_pm, PDO::PARAM_STR);

    return $query->execute();
}

// Requète de changement d'horaire
function changeHourly(PDO $pdo, string $name_day, string $hourly_am, string $hourly_pm, int $id):bool
{
    $query = $pdo->prepare("UPDATE hourly SET name_day = :name_day, hourly_am = :hourly_am, hourly_pm = :hourly_pm WHERE hourly_id = :id"); 
    $query->bindValue(':name_day', $name_day, PDO::PARAM_STR);
    $query->bindValue(':hourly_am', $hourly_am, PDO::PARAM_STR);
    $query->bindValue(':hourly_pm', $hourly_pm, PDO::PARAM_STR);
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    return $query->execute();
}