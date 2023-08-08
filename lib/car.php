<?php

// $cars = [
//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam est at earum vero ipsam quam. Dolor recusandae sequi aut ab, officiis fugit, minima itaque quo saepe magnam ipsa doloribus sunt?', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],

//     ['title' => 'CLIO | 20.000 km | 2015', 'description' => 'Renault Clio Estate TCE 90 LIMITED GARANTIE 3ANS break, rouge metallise, 5 cv, 5 portes, première mise en circulation le 12/12/2019, garantie 36 mois.', 'image' => 'clio.jpg', 'price' => '10.000 €'],
// ];

function getCars(PDO $pdo):array|bool
{
    
    $query = $pdo->prepare("SELECT * FROM car");
    $query->execute();
    $car = $query->fetchAll(PDO::FETCH_ASSOC);

    return $car;
}

function getImages(PDO $pdo)
{
    $query = $pdo->prepare("SELECT * FROM image_car JOIN car ON image_car.car_id = car.car_id");
    $query->execute();
    $image = $query->fetchAll(PDO::FETCH_ASSOC);
    var_dump($image);

    // return $images;
}