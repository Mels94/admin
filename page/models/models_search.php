<?php

require_once '../../connect/connect.php';


$keyUp = $_POST['key'];



$select = $conn->query("SELECT * FROM `models` WHERE `name` LIKE '$keyUp%' ORDER BY `id` DESC");
$searchModels = $select->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($searchModels);



