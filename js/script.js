//Delete categories
$(document).on('click', '.delete_categories', function () {
    let id = $(this).closest("tr")[0].cells[0].innerText;
    let del = $(this).closest("tr")[0];

    let conf = confirm('Իրոք ուզում եք ջնջել');
    if (conf){
        $.ajax({
            url: 'page/categories/categories_delete.php',
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


//Delete models
$(document).on('click', '.delete_models', function () {
    let id = $(this).closest("tr")[0].cells[0].innerText;
    let del = $(this).closest("tr")[0];

    let conf = confirm('Իրոք ուզում եք ջնջել');
    if (conf){
        $.ajax({
            url: 'page/models/models_delete.php',
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
