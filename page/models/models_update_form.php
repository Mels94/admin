
<?php
require 'connect/connect.php';

$id = $_GET['id'];
$categories_id = $_GET['categories_id'];

//$models_category = $conn->query("SELECT * FROM `models`");
$models_category = $conn->query("SELECT * FROM `categories`");
$models_category->execute();
$arrModelsCategory = $models_category->fetchAll(PDO::FETCH_ASSOC);


?>

<!--<form action="" method="post">
    <h2>update</h2>
    <select name="taskOption">
        <option>All</option>
        <?php /*foreach ($arrModelsCategory as $value): */?>
            <option value="<?/*= $value['id']; */?>" <?php /*if ($value['id'] == $id) { */?> selected <?php /*} */?>><?/*= $value['name']; */?></option>
        <?php /*endforeach; */?>
    </select>
    <input type="submit" name="submit" value="Update">
</form>-->

<h1>Update models</h1>

<form action="" method="post">
    <select name="taskOption">
        <option>All categories</option>
        <?php foreach ($arrModelsCategory as $value): ?>
            <option value="<?= $value['id']; ?>" <?php if ($value['id'] == $categories_id) { ?> selected <?php } ?>><?= $value['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="submit" value="Update">
</form>

<?php



/*if (isset($_POST['submit'])) {

    if (!empty($_POST['taskOption'])) {

        $option = $_POST['taskOption'];

        $models_select = $conn->query("SELECT `name` FROM `models` WHERE `id`='$option'");
        $models_select->execute();
        $arrModels_name = $models_select->fetchAll(PDO::FETCH_ASSOC);
        $change_name = $arrModels_name[0]['name'];

        $update = $conn->prepare("UPDATE `models` SET `name`='$change_name' WHERE `id`='$id'");
        $update->execute();

        header('Location:admin.php?models=models');
        die;
    }
}*/


if (isset($_POST['submit'])) {

    if (!empty($_POST['taskOption'])) {

        $option = $_POST['taskOption'];

        $update = $conn->prepare("UPDATE `models` SET `categories_id`='$option' WHERE `id`='$id'");
        $update->execute();

        header('Location:admin.php?models=models');
        die;
    }
}

?>