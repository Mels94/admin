<?php
session_start();
require_once 'connect/connect.php';
function auth()
{
    global $conn;
    $isAuth = false;
    $user = null;
    if ($_SESSION['user_id']) {
        $isAuth = true;
        $user = $conn->query("SELECT * FROM `user` WHERE `id` = '{$_SESSION['user_id']}'")->fetch(PDO::FETCH_ASSOC);
    } elseif ($_COOKIE['cookie_key']) {
        $key = $_COOKIE['cookie_key'];
        $select = $conn->query("SELECT * FROM `user` WHERE `cookie_key` = '$key'");
        $arrUser = $select->fetchAll(PDO::FETCH_ASSOC);
        if ($arrUser) {
            $user =  $arrUser[0];
            $_SESSION['user_id'] = $arrUser[0]['id'];
            $adminCookie = md5($arrUser[0]['id'] . rand(1, 99));
            $conn->query("UPDATE `user` SET `cookie_key` = '$adminCookie' WHERE `cookie_key` = '$key'");
            setcookie('cookie_key', $adminCookie, time() + (60 * 60 * 24));
            $isAuth = true;
        }
    }
    $conn = null;
    if (!$isAuth) {
        session_unset();
        session_destroy();
        header('Location:index.php');
        die;
    }
    return $user;
}
/*function login(){
    global $conn;
    if (isset($_COOKIE['cookie_key'])) {
        $key = $_COOKIE['cookie_key'];
        $select = $conn->query("SELECT * FROM `user` WHERE `cookie_key` = '$key'");
        $arrUser = $select->fetchAll(PDO::FETCH_ASSOC);
        if ($arrUser) {
            $_SESSION['user_id'] = $arrUser[0]['id'];
            $adminCookie = md5($arrUser[0]['id'] . rand(1, 89));
            $conn->query("UPDATE `user` SET `cookie_key` = '$adminCookie' WHERE `cookie_key` = '$key'");
            setcookie('cookie_key', $adminCookie, time() + (60 * 60 * 24));
            header('Location:admin.php');
            die;
        }
    }
    $conn = null;
    session_unset();
    session_destroy();
}*/