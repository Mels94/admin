<?php
require 'connect/connect.php';

$id = $_GET['id'];
$categories_id = $_GET['categories_id'];
$models_id = $_GET['models_id'];

$category = $conn->query("SELECT * FROM `categories`");
$category->execute();
$arrCategory = $category->fetchAll(PDO::FETCH_ASSOC);

$models = $conn->query("SELECT * FROM `models`");
$models->execute();
$arrModels = $models->fetchAll(PDO::FETCH_ASSOC);


$select_product_id = $conn->prepare("SELECT * FROM `product` WHERE `id`='$id'");
$select_product_id->execute();
$arrProduct_id = $select_product_id->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
//var_dump($arrProduct_id);
//echo '</pre>';

?>



<div class="card form_card">
    <form class="text-center border border-light p-5" action="" method="post">
        <h2 class="mb-4">Update product</h2>
        <input type="text" name="update_name" class="form-control mb-4" placeholder="Name" value="<?= $arrProduct_id[0]['name']; ?>">

        <select class="custom-select mb-4" name="OptionCategory">
            <option>All categories</option>
            <?php foreach ($arrCategory as $value): ?>
                <option value="<?= $value['id']; ?>" <?php if ($value['id'] == $categories_id) { ?> selected <?php } ?> ><?= $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <select class="custom-select mb-4" name="OptionModels">
            <option>All models</option>
            <?php foreach ($arrModels as $val): ?>
                <option value="<?= $val['id']; ?>" <?php if ($val['id'] == $models_id) { ?> selected <?php } ?> ><?= $val['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="file" name="images" class="form-control-file mb-4">
        <input type="radio" name="radio" id="new" value="1" <?php if ($arrProduct_id[0]['isNew'] == 1) { ?> checked <?php } ?>>
        <label for="new">New</label>
        <input type="radio" name="radio" id="old" value="0" <?php if ($arrProduct_id[0]['isNew'] == 0) { ?> checked <?php } ?>>
        <label for="old">Old</label>
        <textarea class="form-control mb-4" name="desc" placeholder="Description..." rows="2"><?= $arrProduct_id[0]['desc_info']; ?></textarea>
        <input type="number" name="price" class="form-control mb-4" placeholder="Price" value="<?= $arrProduct_id[0]['price']; ?>">

        <!-- Sign up button -->
        <input class="btn btn-info my-4 btn-block back" type="submit" name="submit" value="Update">
        <a href="admin.php?product=product" class="btn btn-info my-4 btn-block">&#8656; Go back</a>
    </form>
</div>

<?php


if (isset($_POST['submit'])) {
        if (!empty($_POST['update_name'] && $_POST['OptionCategory'] && $_POST['OptionModels'] &&
            $_POST['images'] && $_POST['desc'] && $_POST['price'])) {
            if (isset($_POST['radio'])) {
                $name = $_POST['update_name'];
                $category_name = $_POST['OptionCategory'];
                $model_name = $_POST['OptionModels'];
                $img_path = $_POST['images'];
                $isNew = $_POST['radio'];
                $desc = $_POST['desc'];
                $price = $_POST['price'];

                $update = $conn->prepare("UPDATE `product` SET `name`='$name', `categories_id`='$category_name', `models_id`='$model_name',
                        `img_path`='$img_path', `isNew`='$isNew', `desc_info`='$desc', `price`='$price' WHERE `id`='$id'");
                $update->execute();

/*                header('Location:admin.php?product=product');
                die;*/
            }

        }

}


?>


