
-- # Création table users
CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(255) NOT NULL ,
    firstname VARCHAR(255) NOT NULL ,
    email VARCHAR(255) NOT NULL ,
    password VARCHAR(255) NOT NULL ,
    role VARCHAR(20) NOT NULL
);

-- # Création table des horaires
CREATE TABLE hourly
(
    hourly_id INT AUTO_INCREMENT PRIMARY KEY,
    name_day VARCHAR(25) NOT NULL ,
    hourly_am VARCHAR(25) NOT NULL ,
    hourly_pm VARCHAR(25) NOT NULL
);

-- # Création table car
CREATE TABLE car (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL ,
    description TEXT NOT NULL,
    price FLOAT NOT NULL ,
    mileage DECIMAL NOT NULL ,
    year DECIMAL NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user (user_id)
    ON DELETE CASCADE
);

-- # Création table equipment
CREATE TABLE equipment (
    equipment_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL ,
    car_id INT,
    FOREIGN KEY (car_id) REFERENCES car (car_id)
    ON DELETE CASCADE
);

-- #Insertion admin
INSERT INTO user (lastname, firstname, email, password, role) VALUES ('Parrot', 'Vincent', 'vincent@parrot.com', 'V_garage_2023', 'admin');

-- # Creation table service
CREATE TABLE services (
    service_id INT PRIMARY KEY AUTO_INCREMENT,
    name_service VARCHAR (255) NOT NULL,
    description TEXT NOT NULL,
    image_service VARCHAR(255) NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user (user_id)
    ON UPDATE CASCADE
);

-- # Création table des images car
CREATE TABLE image_car
(
    image_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    name_image VARCHAR(255) NOT NULL ,
    car_id INT,
    FOREIGN KEY (car_id) REFERENCES car (car_id)
    ON DELETE CASCADE
);

-- # Création table contact
CREATE TABLE contact
(
    contact_id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone INT(10) NOT NULL,
    text TEXT NOT NULL,
    car_id INT,
    FOREIGN KEY (car_id) REFERENCEs car (car_id)
    ON DELETE CASCADE
);

-- # Création table opinion
CREATE TABLE opinion
(
    opinion_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL ,
    opinion_text TEXT,
    note INT,
    verify VARCHAR(3) DEFAULT NULL
)