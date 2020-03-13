<h1>Models</h1>


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
        <tr>
            <td>1</td>
            <td>BMW</td>
            <td>2020-03-12 21:02:23</td>
            <td>2020-03-12 21:36:29</td>
            <td>
                <button type="button" class="change">Edit</button>
                <button type="button" class="delete">Delete</button>
            </td>
        </tr>
    </tbody>
</table>


<script>
    $('.change').on('click', function () {

        let id = $(this).closest("tr")[0].cells[0].innerText;
        let name = $(this).closest("tr")[0].cells[1].innerText;
        //let new_name = $(this).closest("tr")[0].cells[1].remove();
        console.log($(this).closest("tr")[0].cells[1].prepend(`<td>fghjk</td>`));

    });

</script>