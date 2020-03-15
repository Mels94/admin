
<?php
require 'connect/connect.php';

if (isset($_GET['models']) && file_exists('page/models/'.$_GET['models'].'.php')) {
    $page = 'models/'.$_GET['models'];
}

$models_category = $conn->query("SELECT `mod`.*, `cat`.`name` as `cat_name`
FROM `models` AS `mod`
         LEFT JOIN `categories` AS `cat`
                   ON `mod`.`categories_id` = `cat`.`id`;");
$models_category->execute();
$arrModelsCategory = $models_category->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
//var_dump($arrModelsCategory);
?>


<a href="?models=models_insert_form" class="create_new">Create Models</a>

<table class="table table-hover table-dark">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Categories_name</th>
        <th>Create_time</th>
        <th>Update_time</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($arrModelsCategory as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['cat_name'] ?></td>
            <td><?= $item['create_time'] ?></td>
            <td><?= $item['update_time'] ?></td>
            <td>
<!--                <a href="?models=models_update_form&id=<?/*= $item['id'] */?>" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>-->
                <a href="?models=models_update_form&id=<?= $item['id'] ?>&categories_id=<?= $item['categories_id'] ?>" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a class="delete_models delete"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>