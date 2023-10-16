<?php

// Code a utiliser pour déployement

try 
{
    // DSN de connexion
    $dsn = "mysql:dbname="._DB_NAME_PATH_.";host="._DB_SERVER_.";charset=utf8mb4";
    //option de conncetion PDO, mode erreur en cas de problème
    $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    // Nouvelle instance de PDO
    $pdo = new PDO($dsn,_DB_USER_, _DB_PASSWORD_, $option);
}
catch (Exception $e)
{
    die ('Erreur : ' . $e->getMessage());
}


// Code à utiliser pour local

// try 
// {
//     // DSN de connexion
//     $dsn = "mysql:dbname="mysql:dbname="NOM DE DB CHOISIS";host=localhost;charset=utf8mb4";
//     //option de conncetion PDO, mode erreur en cas de problème
//     $option = [
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     ];

//     // Nouvelle instance de PDO
//     $pdo = new PDO($dsn, $option);
// }
// catch (Exception $e)
// {
//     die ('Erreur : ' . $e->getMessage());
// }

