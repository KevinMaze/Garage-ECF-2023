<?php

// ajout de contact en bdd
function addContact(PDO $pdo, string $lastname, string $firstname, string $email, int $phone, string $text, int|null $car_id):bool
{
    $query = $pdo->prepare("INSERT INTO contact (lastname, firstname, email, phone, text, car_id)VALUES (:lastname, :firstname, :email, :phone, :text, :car_id)");

    $query->bindValue(":lastname", $lastname, PDO::PARAM_STR);
    $query->bindValue(":firstname", $firstname, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->bindValue(":phone", $phone, PDO::PARAM_INT);
    $query->bindValue(":text", $text, PDO::PARAM_STR);
    $query->bindValue(":car_id", $car_id, PDO::PARAM_INT);

    return $query->execute();
}

// récupération des contacts
function getContact(PDO $pdo):array|bool
{
    $sql = ("SELECT * FROM contact");
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}