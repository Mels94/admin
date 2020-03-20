<?php
require 'connect/connect.php';

?>


<div class="card form_card">
    <form class="text-center border border-light p-5" action="" method="post">
        <h2 class="mb-4">Add new categories</h2>
        <input type="text" name="insert_name" class="form-control mb-4" placeholder="Name">

        <!-- Sign up button -->
        <input class="btn btn-info my-4 btn-block" type="submit" name="submit" value="Insert">
    </form>
</div>

<?php

if (isset($_POST['submit'])) {
    if (!empty($_POST['insert_name'])) {

        $name = $_POST['insert_name'];

        $insert = $conn->prepare("INSERT INTO `categories` (`name`, `create_time`, `update_time`) VALUES
                                ('$name', now(), now())");
        $insert->execute();

        header('Location: admin.php?categories=categories');
        die;
    }
}

?>