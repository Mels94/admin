
<?php
require 'connect/connect.php';

$category = $conn->query("SELECT * FROM `categories`");
$category->execute();
$arrCategory = $category->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="card form_card">
    <form class="text-center border border-light p-5" action="admin.php?models=models_insert_form" method="post">
        <h2 class="mb-4">Add new models</h2>
        <input type="text" name="insert_name" class="form-control mb-4" placeholder="Name">
        <select class="custom-select mb-4" name="CategoryOption">
            <option>All categories</option>
            <?php foreach ($arrCategory as $value): ?>
                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Sign up button -->
        <input class="btn btn-info my-4 btn-block" type="submit" name="submit" value="Insert">
    </form>
</div>


<?php


if (isset($_POST['submit'])) {
    if (!empty($_POST['insert_name'] && $_POST['CategoryOption'])) {

        $name = $_POST['insert_name'];
        $option = $_POST['CategoryOption'];

        $insert = $conn->prepare("INSERT INTO `models` (`name`, `categories_id`, `create_time`, `update_time`)
                        VALUES ('$name', '$option', now(), now())");
        $insert->execute();
        $conn = null;

        header('Location:admin.php?models=models');
        die;
   }
}

?>