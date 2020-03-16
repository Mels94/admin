
<?php
require 'connect/connect.php';

$select = $conn->query("SELECT * FROM `categories` ORDER BY `id` DESC");
$arrCategory = $select->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['categories']) && file_exists('page/categories/'.$_GET['categories'].'.php')) {
    $page = 'categories/'.$_GET['categories'];
}

?>


<a href="?categories=categories_insert_form" class='create_new'>Create Categories</a>

<table class="table table-hover table-dark">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Create_time</th>
        <th>Update_time</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($arrCategory as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['create_time'] ?></td>
            <td><?= $item['update_time'] ?></td>
            <td>
                <a href="?categories=categories_update_form&id=<?= $item['id'] ?>" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a class="delete_categories delete"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

