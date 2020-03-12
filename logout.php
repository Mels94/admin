<?php
session_start();
require_once 'connect/connect.php';

if ($_COOKIE['cookie_key']){
    setcookie('cookie_key','', time() - (60 * 60 * 24));
    setcookie('name','', time() - (60 * 60 * 24));
    $update = $conn->query("UPDATE `user` SET `cookie_key` = NULL 
                                                    WHERE `name` = 'admin'");
}
session_unset();
session_destroy();
header('Location: index.php');die;
