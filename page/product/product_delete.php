<?php

require_once '../../connect/connect.php';

$del_id = $_POST['del_id'];

$delete = $conn->prepare("DELETE FROM `product` WHERE `id`='$del_id'");
$delete->execute();
//echo 1;
echo json_encode($del_id);