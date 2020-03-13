<?php
require_once '../../connect/connect.php';

$del_id = $_POST['del_id'];

$delete = $conn->prepare("DELETE FROM `categories` WHERE `id`='$del_id'");
$delete->execute();
echo 1;
//echo json_encode($del_id);