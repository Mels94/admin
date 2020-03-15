<?php
$host = 'mysql:host=localhost; dbname=admin';
$username = 'root';
$password = '';
$error = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];


try {
    $conn = new PDO($host, $username, $password, $error);
} catch (PDOException $e) {
    echo $e->getMessage();
}


$table = "CREATE TABLE IF NOT EXISTS `user`(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) UNIQUE NOT NULL,
password VARCHAR(100) NOT NULL,
cookie_key VARCHAR(100)
)";

$conn->exec($table);


$adminName = 'admin';
$adminPassword = 'admin';


$insert = $conn->prepare("INSERT INTO `user`(`name`,`password`,`cookie_key`) VALUES 
                    ('$adminName','$adminPassword', NULL )");
$user = $insert->execute();



$categories = "CREATE TABLE IF NOT EXISTS `categories`(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
create_time DATETIME,
update_time TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
)";
$conn->exec($categories);

/*$insert = $conn->prepare("INSERT INTO `categories` (`name`, `create_time`, `update_time`) VALUES ('Toyota', now(), now())");
$insert->execute();*/


$models = "CREATE TABLE IF NOT EXISTS `models`(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
categories_id INT(11),
create_time DATETIME,
update_time TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
)";
$conn->exec($models);


/*$insert_models = $conn->prepare("INSERT INTO `models` (`name`, `categories_id`, `create_time`, `update_time`)
                    VALUES ('X5', '2', now(), now())");
$insert_models->execute();*/



$alter_models = "ALTER TABLE models
ADD FOREIGN KEY (categories_id) REFERENCES categories(id)";
$conn->exec($alter_models);


