<?php
require 'connect/connect.php';
require 'auth/auth.php';
auth();

if (isset($_GET['page']) && file_exists('page/'.$_GET['page'].'.php')) {
    $page = $_GET['page'];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'
          integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>


<div id="wrapper">
    <div id="header">
        <h1>Դինամիկ վեբ կայք PHP / MySQL</h1>
    </div>
    <div id="container">
        <div id="side" class="white">
            <h1>Menu</h1>
            <ul>
                <li><a href="?page=categories">Categories</a></li>
                <li><a href="?page=models">Models</a></li>
                <li><a href="?page=product">Product</a></li>
                <li><a href="logout.php">Exit</a></li>
            </ul>
        </div>
        <div id="content">
            <?php require_once('page/'.$page.'.php'); ?>
        </div>
    </div>
    <div id="footer"></div>
</div>


</body>
</html>

