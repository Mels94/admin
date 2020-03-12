<?php
require_once 'auth/auth.php';
auth();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
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
                <li><a href="categories/categories.php">Categories</a></li>
                <li><a href="#">Models</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="logout.php">Exit</a></li>
            </ul>
        </div>
        <div id="content"></div>
    </div>
    <div id="footer"></div>
</div>


</body>
</html>

