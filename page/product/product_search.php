<?php

require_once '../../connect/connect.php';


$keyUp = $_POST['key'];



$select = $conn->query("SELECT * FROM `product` WHERE `name` LIKE '$keyUp%' ORDER BY `id` DESC");
$searchProduct = $select->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($searchProduct);