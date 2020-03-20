
<?php
require 'connect/connect.php';

$id = $_GET['id'];
$categories_id = $_GET['categories_id'];

$category = $conn->query("SELECT * FROM `categories`");
$category->execute();
$arrCategory = $category->fetchAll(PDO::FETCH_ASSOC);


$select_models_id = $conn->prepare("SELECT * FROM `models` WHERE `id`='$id'");
$select_models_id->execute();
$arrModels_id = $select_models_id->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="card form_card">
    <form class="text-center border border-light p-5" action="" method="post">
        <h2 class="mb-4">Update models</h2>
        <input type="text" name="update_name" class="form-control mb-4" placeholder="Name" value="<?= $arrModels_id[0]['name'] ?>">

        <select class="custom-select mb-4" name="CategoryOption">
            <option>All categories</option>
            <?php foreach ($arrCategory as $value): ?>
                <option value="<?= $value['id']; ?>" <?php if ($value['id'] == $categories_id) { ?> selected <?php } ?> ><?= $value['name']; ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Sign up button -->
        <input class="btn btn-info my-4 btn-block" type="submit" name="submit" value="Update">
    </form>
</div>


<?php


if (isset($_POST['submit'])) {

    if (!empty($_POST['update_name'] && $_POST['CategoryOption'])) {

        $name = $_POST['update_name'];
        $option = $_POST['CategoryOption'];

        $update = $conn->prepare("UPDATE `models` SET `name`='$name',`categories_id`='$option' WHERE `id`='$id'");
        $update->execute();

        header('Location:admin.php?models=models');
        die;
    }
}

?>