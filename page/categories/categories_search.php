<?php

require_once '../../connect/connect.php';


$keyUp = $_POST['key'];



$select = $conn->query("SELECT * FROM `categories` WHERE `name` LIKE '$keyUp%' ORDER BY `id` DESC");
$searchCategory = $select->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($searchCategory);



