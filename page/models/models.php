
<?php
require 'connect/connect.php';


/*pagination*/
$models_count = $conn->prepare("SELECT * FROM `models`");
$models_count->execute();
$count = $models_count->rowCount();
$page_rows = 5;

$list = ceil($count/$page_rows);
if($list < 1) {
    $last = 1;
}
$pn = 1;

if (isset($_GET['pn'])){
    $pn = $_GET['pn'];
}
if ($pn < 1){
    $pn = 1;
}elseif ($pn > $list){
    $pn = $list;
}
$pagination_link = '';
if ($list != 1){
    if ($pn > 1){
        //previous page
        $previous = $pn - 1;
        $pagination_link .= '<a href="?models=models&pn='.$previous.'" class="pn">prev</a>';
        //left page
        for ($i = $pn - 2; $i < $pn; $i++){
            if ($i > 0){
                $pagination_link .= '<a href="?models=models&pn='.$i.'" class="pn">'.$i.'</a>';
            }
        }
    }
    $pagination_link .= '<a class="pn active">'.$pn.'</a>';
    //right page
    for ($i = $pn + 1; $i <= $list; $i++){
        $pagination_link .= '<a href="?models=models&pn='.$i.'" class="pn">'.$i.'</a>';
        if ($i >= $pn + 2){
            break;
        }
    }
    //next page
    if ($pn != $list){
        $next = $pn + 1;
        $pagination_link .= '<a href="?models=models&pn='.$next.'" class="pn">next</a>';
    }
}
$limit = 'LIMIT '.($pn - 1) * $page_rows.','.$page_rows;



$models_category = $conn->query("SELECT `mod`.*, `cat`.`name` as `cat_name`
FROM `models` AS `mod`
         LEFT JOIN `categories` AS `cat`
                   ON `mod`.`categories_id` = `cat`.`id` ORDER BY `id` DESC $limit");
$models_category->execute();
$arrModelsCategory = $models_category->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
//var_dump($arrModelsCategory);



?>

<div class="page_contents">
    <h3>MODELS</h3>
    <input type="text" placeholder="Search Name" class="search">
    <a href="?models=models_insert_form" class='btn btn-success create_new'>Create Models</a>

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
        <tbody id="tbody">
        <?php foreach ($arrModelsCategory as $item): ?>
            <tr class="remove">
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['cat_name'] ?></td>
                <td><?= $item['create_time'] ?></td>
                <td><?= $item['update_time'] ?></td>
                <td>
                    <a href="?models=models_update_form&id=<?= $item['id'] ?>&categories_id=<?= $item['categories_id'] ?>" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a class="delete_models delete"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <ul>
            <li class="page_href"><?= $pagination_link ?></li>
        </ul>
    </div>
</div>


<script>
    $('.search').keyup(function () {

        let keyUp = $(this)[0].value;

        $.ajax({
            url: 'page/models/models_search.php',
            type: 'post',
            dataType: 'json',
            data: {key: keyUp},
            success: function (data) {
                $('.remove').remove();

                data.forEach((i) => {
                    $('#tbody').append(`
                    <tr class="remove">
                        <td>${i.id}</td>
                        <td>${i.name}</td>
                        <td>${i.categories_id}</td>
                        <td>${i.create_time}</td>
                        <td>${i.update_time}</td>
                        <td>
                            <a href="?models=models_update_form&id=${i.id}&categories_id=${i.categories_id}" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete_models delete"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    `);

                });
            }
        })


    });


</script>