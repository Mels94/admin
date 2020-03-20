
<?php
require 'connect/connect.php';

/*pagination*/
$category_count = $conn->prepare("SELECT * FROM `categories`");
$category_count->execute();
$count = $category_count->rowCount();
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
        $pagination_link .= '<a href="?categories=categories&pn='.$previous.'" class="pn">prev</a>';
        //left page
        for ($i = $pn - 2; $i < $pn; $i++){
            if ($i > 0){
                $pagination_link .= '<a href="?categories=categories&pn='.$i.'" class="pn">'.$i.'</a>';
            }
        }
    }
    $pagination_link .= '<a class="pn active">'.$pn.'</a>';
    //right page
    for ($i = $pn + 1; $i <= $list; $i++){
        $pagination_link .= '<a href="?categories=categories&pn='.$i.'" class="pn">'.$i.'</a>';
        if ($i >= $pn + 2){
            break;
        }
    }
    //next page
    if ($pn != $list){
        $next = $pn + 1;
        $pagination_link .= '<a href="?categories=categories&pn='.$next.'" class="pn">next</a>';
    }
}
$limit = 'LIMIT '.($pn - 1) * $page_rows.','.$page_rows;



$select = $conn->query("SELECT * FROM `categories` ORDER BY `id` DESC $limit");
$arrCategory = $select->fetchAll(PDO::FETCH_ASSOC);



?>

<div class="page_contents">
    <h3>CATEGORIES</h3>
    <input type="text" placeholder="Search Name" class="search">
    <a href="?categories=categories_insert_form" class='btn btn-success create_new'>Create Categories</a>

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
        <tbody id="tbody">
        <?php foreach ($arrCategory as $item): ?>
            <tr class="remove">
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
            url: 'page/categories/categories_search.php',
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
                        <td>${i.create_time}</td>
                        <td>${i.update_time}</td>
                        <td>
                            <a href="?categories=categories_update_form&id=${i.id}" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete_categories delete"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    `);
                });
/*                $('.pagination').append(`<ul class="remove">
                            <li class="page_href"><?= $pagination_link ?></li>
                          </ul>`);*/
            }
        })


    });


</script>