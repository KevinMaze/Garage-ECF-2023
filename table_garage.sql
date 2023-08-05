-- # Création table users
CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(255) NOT NULL ,
    firstname VARCHAR(255) NOT NULL ,
    email VARCHAR(255) NOT NULL ,
    password VARCHAR(255) NOT NULL ,
    role VARCHAR(20) NOT NULL
);

-- # Création table car
CREATE TABLE car (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL ,
    description TEXT NOT NULL,
    price FLOAT NOT NULL ,
    mileage DECIMAL NOT NULL ,
    year DECIMAL NOT NULL
);

-- # Création table write (relation user écriture article car)
CREATE TABLE user_car(
    user_id INT,
    car_id INT,
    PRIMARY KEY (user_id, car_id),
    FOREIGN KEY (user_id) REFERENCES user (user_id),
    FOREIGN KEY  (car_id) REFERENCES car (car_id)
)

-- # Création table images_car
CREATE TABLE image_car (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    car_id INT,
    FOREIGN KEY (car_id) REFERENCES car(car_id)
)

-- # Création table equipment
CREATE TABLE equipment (
    equipment_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)

-- # Création table relation equipment car
CREATE TABLE equipment_car (
    car_id INT,
    equipment_id INT,
    PRIMARY KEY (car_id, equipment_id),
    FOREIGN KEY (car_id) REFERENCES car (car_id),
    FOREIGN KEY (equipment_id) REFERENCES equipment (equipment_id)
)