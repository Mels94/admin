<h1>FORM MODELS</h1>

<?php
require 'connect/connect.php';

$models_category = $conn->query("SELECT `mod`.*, cat.`name`
FROM models AS `mod`
       LEFT JOIN categories AS cat
                 ON `mod`.`categories_id` = cat.`id`");
$models_category->execute();
$arrModelsCategory = $models_category->fetchAll(PDO::FETCH_ASSOC);


?>

<form action="" method="post">
    <h2>insert</h2>
    <input type="text" name="name">
    <select name="taskOption">
        <option></option>
        <?php foreach ($arrModelsCategory as $value): ?>
            <option value="<?= $value['categories_id']; ?>"><?= $value['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="submit" value="Insert">
</form>

<?php



if (isset($_POST['submit'])) {
    if (!empty($_POST['name'] && $_POST['taskOption'])) {

        $name = $_POST['name'];
        $option = $_POST['taskOption'];

        $insert = $conn->prepare("INSERT INTO `models` (`name`, `categories_id`, `create_time`, `update_time`)
                        VALUES ('$name', '$option', now(), now())");
        $insert->execute();

        header('Location: admin.php?models=models');

   }
}

?>