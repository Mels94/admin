<?php
require 'connect/connect.php';

?>

<h1>FORM CATEGORIES</h1>


<form action="" method="post">
    <h2>insert</h2>
    <input type="text" name="name">
    <input type="submit" name="submit" value="Insert">
</form>

<?php

if (isset($_POST['submit'])){
    if (!empty($_POST['name'])){

        $name = $_POST['name'];

        $insert = $conn->prepare("INSERT INTO `categories` (`name`, `create_time`, `update_time`) VALUES
                                ('$name', now(), now())");
        $insert->execute();

        header('Location: admin.php?categories=categories');

    }
}

?>