<?php
require 'connect/connect.php';

$category = $conn->query("SELECT * FROM `categories`");
$category->execute();
$arrCategory = $category->fetchAll(PDO::FETCH_ASSOC);

$models = $conn->query("SELECT * FROM `models`");
$models->execute();
$arrModels = $models->fetchAll(PDO::FETCH_ASSOC);
/*echo '<pre>';
var_dump($arrModels);
echo '</pre>';*/


?>

<div class="card form_card">
    <form class="text-center border border-light p-5" action="admin.php?product=product_insert_form" method="post">
        <h2 class="mb-4">Add new product</h2>
        <input type="text" name="insert_name" class="form-control mb-4" placeholder="Name">

        <select class="custom-select mb-4" name="CategoryOption">
            <option>All categories</option>
            <?php foreach ($arrCategory as $value): ?>
                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <select class="custom-select mb-4" name="ModelsOption">
            <option>All models</option>
            <?php foreach ($arrModels as $val): ?>
                <option value="<?= $val['id']; ?>"><?= $val['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="file" name="images" class="form-control-file mb-4">
        <input type="radio" name="radio" id="new" value="1">
        <label for="new">New</label>
        <input type="radio" name="radio" id="old" value="0">
        <label for="old">Old</label>
        <textarea class="form-control mb-4" name="desc" placeholder="Description..." rows="2"></textarea>
        <input type="number" name="price" class="form-control mb-4" placeholder="Price">

        <!-- Sign up button -->
        <input class="btn btn-info my-4 btn-block" type="submit" name="submit" value="Insert">
        <a href="admin.php?product=product" class="btn btn-info my-4 btn-block">&#8656; Go back</a>
    </form>
</div>

<?php


if (isset($_POST['submit'])) {
    if (!empty($_POST['insert_name'] && $_POST['CategoryOption'] && $_POST['ModelsOption'] &&
        $_POST['images'] && $_POST['desc'] && $_POST['price'])){
        if (isset($_POST['radio'])){

            $name = $_POST['insert_name'];
            $category_name = $_POST['CategoryOption'];
            $model_name = $_POST['ModelsOption'];
            $img_path = $_POST['images'];
            $isNew = $_POST['radio'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];

            $insert = $conn->prepare("INSERT INTO `product` (`name`, `categories_id`, `models_id`, `img_path`, `isNew`,
            `desc_info`, `price`, `create_time`, `update_time`) VALUES ('$name', '$category_name', '$model_name', '$img_path',
                                        '$isNew', '$desc', '$price', now(), now())");
            $insert->execute();

//            header('Location:admin.php?product=product');
//            die;
        }
    }
}

?>

