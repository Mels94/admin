<?php

require_once '../connect/connect.php';

$id = $_POST['id'];
$name_change = $_POST['name'];


$update = $conn->prepare("UPDATE `categories` SET `name`='$name_change' WHERE `id`='$id'");
$update->execute();