
<?php
require 'connect/connect.php';

$id = $_GET['id'];
$categories_id = $_GET['categories_id'];

$models_category = $conn->query("SELECT * FROM `categories`");
$models_category->execute();
$arrModelsCategory = $models_category->fetchAll(PDO::FETCH_ASSOC);


$select_models_id = $conn->prepare("SELECT * FROM `models` WHERE `id`='$id'");
$select_models_id->execute();
$arrModels_id = $select_models_id->fetchAll(PDO::FETCH_ASSOC);


?>


<h1>Update models</h1>

<form action="" method="post">
    <input type="text" name="name" value="<?= $arrModels_id[0]['name'] ?>">
    <select name="taskOption">
        <option>All categories</option>
        <?php foreach ($arrModelsCategory as $value): ?>
            <option value="<?= $value['id']; ?>" <?php if ($value['id'] == $categories_id) { ?> selected <?php } ?>><?= $value['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="submit" value="Update">
</form>

<?php


if (isset($_POST['submit'])) {

    if (!empty($_POST['taskOption'])) {

        $name = $_POST['name'];
        $option = $_POST['taskOption'];


        $update = $conn->prepare("UPDATE `models` SET `name`='$name',`categories_id`='$option' WHERE `id`='$id'");
        $update->execute();

        header('Location:admin.php?models=models');
        die;
    }
}

?>