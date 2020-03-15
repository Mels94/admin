<?php

require 'connect/connect.php';

$id = $_GET['id'];

$select_category = $conn->prepare("SELECT * FROM `categories` WHERE `id`='$id'");
$select_category->execute();
$arrCategory = $select_category->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Update categories</h1>


<form action="" method="post">
    <input type="text" name="name" value="<?= $arrCategory[0]['name'] ?>">
    <input type="submit" name="submit" value="Update">
</form>


<?php

if (isset($_POST['submit'])){
    if (!empty($_POST['name'])){

        $name = $_POST['name'];

        $update = $conn->prepare("UPDATE `categories` SET `name`='$name' WHERE `id`='$id'");
        $update->execute();

        header('Location: admin.php?categories=categories');
    }
}

?>