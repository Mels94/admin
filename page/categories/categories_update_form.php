<?php

require 'connect/connect.php';

$id = $_GET['id'];

$select_category = $conn->prepare("SELECT * FROM `categories` WHERE `id`='$id'");
$select_category->execute();
$arrCategory = $select_category->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="card form_card">
    <form class="text-center border border-light p-5" action="" method="post">
        <h2 class="mb-4">Update categories</h2>
        <input type="text" name="update_name" class="form-control mb-4" placeholder="Name" value="<?= $arrCategory[0]['name'] ?>">

        <!-- Sign up button -->
        <input class="btn btn-info my-4 btn-block" type="submit" name="submit" value="Update">
    </form>
</div>

<?php

if (isset($_POST['submit'])){
    if (!empty($_POST['update_name'])){

        $name = $_POST['update_name'];

        $update = $conn->prepare("UPDATE `categories` SET `name`='$name' WHERE `id`='$id'");
        $update->execute();

        header('Location: admin.php?categories=categories');
    }
}

?>