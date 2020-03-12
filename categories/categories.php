<?php
require_once '../connect/connect.php';

$select = $conn->query("SELECT * FROM `categories`");
$arrCategory = $select->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
</head>
<body>


<div id="wrapper">
    <div id="header">
        <h1>Դինամիկ վեբ կայք PHP / MySQL</h1>
    </div>
    <div id="container">
        <div id="side" class="white">
            <h1>Menu</h1>
            <ul>
                <li><a href="../categories/categories.php">Categories</a></li>
                <li><a href="#">Models</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="../logout.php">Exit</a></li>
            </ul>
        </div>
        <div id="content">

            <form action="">
                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Create_time</th>
                        <th>Update_time</th>
                        <th>Edit</th>
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
                            <button type="button" class="edit">Edit</button>
                            <button type="button" class="delete">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </form>

        </div>
    </div>
    <div id="footer"></div>
</div>


<script>
    $('.edit').on('click', function () {

        let id = $(this).closest("tr")[0].cells[0].innerText;
        let name = $(this).closest("tr")[0].cells[1].innerText;
        $('#content').before(`<form>
                                <input type="text" value="${name}" class="ml-3 mb-2">
                                <button type="button" data-id="${id}" class="btn btn-success save">Save</button>
                              <form>`);

        $('.save').on('click', function () {
            let _id = $(this).attr('data-id');
            let name_change = $(this)[0].parentElement[0].value;
            $.ajax({
                url: 'change_categories.php',
                type: 'post',
                dataType: 'json',
                data: {id:_id, name:name_change},
                success: function (data) {

                }
            })
        });
    });

</script>

</body>
</html>