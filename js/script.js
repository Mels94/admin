//Delete categories
$(document).on('click', '.delete_categories', function () {
    let id = $(this).closest("tr")[0].cells[0].innerText;
    let del = $(this).closest("tr")[0];
    $.confirm({
        title: 'Warning',
        content: 'do you really want to delete?',
        buttons: {
            OK: function() {
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
            },

            cancel: function () {

            },
        },
    });
});


//Delete models
$(document).on('click', '.delete_models', function () {
    let id = $(this).closest("tr")[0].cells[0].innerText;
    let del = $(this).closest("tr")[0];
    $.confirm({
        title: 'Warning',
        content: 'do you really want to delete?',
        buttons: {
            OK: function() {
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
            },

            cancel: function () {

            },
        },
    });
});


//Delete product
$(document).on('click', '.delete_product', function () {
    let id = $(this).closest("tr")[0].cells[0].innerText;
    let del = $(this).closest("tr")[0];
    $.confirm({
        title: 'Warning',
        content: 'do you really want to delete?',
        buttons: {
            OK: function() {
                $.ajax({
                    url: 'page/product/product_delete.php',
                    type: 'post',
                    dataType: 'json',
                    data: {del_id: id},
                    success: function (data) {
                        if (data) {
                            del.remove();
                        }
                    }
                })
            },
            cancel: function () {

            },
        },
    });
});
