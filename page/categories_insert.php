<?php

require_once '../connect/connect.php';

$name_insert = $_POST['name'];
if (!empty($name_insert)){
    $insert = $conn->prepare("INSERT INTO `categories` (`name`, `create_time`, `update_time`) VALUES ('$name_insert', now(), now())");
    $insert->execute();
}

//echo 1;
//echo json_encode($name_insert);

/*$category = $conn->query("SELECT * FROM `categories` WHERE `name`='$name_insert'");
$rowCategory = $category->fetchAll(PDO::FETCH_ASSOC);*/


//echo $rowCategory[0]['id'];
//echo $rowCategory[0]['name'];