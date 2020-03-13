<?php
require 'connect/connect.php';

$select = $conn->query("SELECT * FROM `categories`");
$arrCategory = $select->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="add"><i class="fa fa-plus-square" aria-hidden="true"></i></div>
<form action="" id="form_insert">
    <input type="text">
    <button type="button" class="btn btn-success insert">Insert</button>
</form>

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
                <div type="button" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
                <div type="button" class="delete"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<script>

    $('.edit').on('click', function () {
        $('.remove').remove();
        let id = $(this).closest("tr")[0].cells[0].innerText;
        let name = $(this).closest("tr")[0].cells[1].innerText;
        //let new_name = $(this).closest("tr")[0].cells[1].remove();

        $('#content').prepend(`<form class="remove my-2">
                                <input type="text" value="${name}" class="ml-2 mt-1 py-1">
                                <button type="button" data-id="${id}" class="btn btn-success save">Save</button>
                              </form>`);

        $('.save').on('click', function () {
            let _id = $(this).attr('data-id');
            let name_change = $(this)[0].parentElement[0].value;
            let _this = $(this).parent();
            $.ajax({
                url: 'page/categories_update.php',
                type: 'post',
                dataType: 'json',
                data: {id: _id, name: name_change},
                success: function (data) {
                    if (data) {

                    }
                }
            });
            _this.hide(1000);
        });
    });

    $('.delete').on('click', function () {

        let id = $(this).closest("tr")[0].cells[0].innerText;
        let del = $(this).closest("tr")[0];

        let conf = confirm('Իրոք ուզում եք ջնջել');
        if (conf){
        $.ajax({
            url: 'page/categories_delete.php',
            type: 'post',
            dataType: 'json',
            data: {del_id: id},
            success: function (data) {
                if (data) {
                    del.remove();
                }
            }
        })
        }
    });

    $('.add').on('click', function () {
        $('#form_insert').toggle(1000);
        $('.insert').on('click', function () {

            let name_add = $(this)[0].parentElement[0].value;
            let _this = $(this).parent();
            $.ajax({
                url: 'page/categories_insert.php',
                type: 'post',
                dataType: 'json',
                data: {name: name_add},
                success: function (data) {
                    if (data) {
                        //console.log(data);
                    }
                }
            });
            _this.hide(1000);
        })
    });


</script>

