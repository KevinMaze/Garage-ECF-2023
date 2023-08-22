<?php

function getHourly(PDO $pdo):array
{
    $sql = "SELECT * FROM hourly";
    $query = $pdo->prepare($sql);
    $query->execute();
    $hourly = $query->fetchAll(PDO::FETCH_ASSOC);

    return $hourly;

}

function addHourly(PDO $pdo, string $name_day, string $hourly_am, string $hourly_pm):bool
{
    $query = $pdo->prepare("INSERT INTO hourly (name_day, hourly_am, hourly_pm) VALUES (:name_day, :hourly_am, :hourly_pm)");

    $query->bindValue(":name_day", $name_day, PDO::PARAM_STR);
    $query->bindValue(":hourly_am", $hourly_am, PDO::PARAM_STR);
    $query->bindValue(":hourly_pm", $hourly_pm, PDO::PARAM_STR);

    return $query->execute();
}