<?php
require_once 'connect/connect.php';

if ($_POST['submit'] && isset($_POST['submit'])) {
    if (!empty($_POST['name'] && $_POST['pass'])) {
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));


        $select = $conn->query("SELECT * FROM `user` WHERE `name` = '$name' and `password` = '$pass'");
        $arrUser = $select->fetchAll(PDO::FETCH_ASSOC);

        if ($arrUser) {
            session_start();
            $_SESSION['user_id'] = $arrUser[0]['id'];
            $_SESSION['auth'] = true;
            $adminCookie = md5($arrUser[0]['id'] . rand(1, 99));
            if (!empty($_POST['remember'])) {
                $update = $conn->query("UPDATE `user` SET `cookie_key` = '$adminCookie' 
                                                    WHERE `name` = 'admin'");
                setcookie('name', $name, time() + (60 * 60 * 24));
                setcookie('cookie_key', $adminCookie, time() + (60 * 60 * 24));
            }
            header('Location: admin.php');
            die;
        } else {
            header('Location: index.php');
            die;
        }
    } else {
        header('Location: index.php');
        die;
    }
}