<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <body>
<div class="container">
    <div class="row"><p><h1>CRUD-EXAM By Aldrean G. Ponsoy</h1></p></div>
    <div style="margin-left:auto; margin-right:auto; padding:auto; width:90%;">
        <p class="pull-right"><a href="add.php" style="cursor:pointer;" class="btn btn-primary"><i class="bi bi-clipboard2-plus-fill"></i> Add New</a></p>
 
        <div id="table"></div>
        <div id="alert" class="alert alert-success" style="display:none;">
            <center><span id="alerttext"></span></center>
        </div>
    </div>
<?php include('modal.php'); ?>
</div>
<script>
$(document).ready(function(){
    showTable();
 
    //add
    $('#add').click(function(){
        $('#addnew').modal('show');
        $('#addForm')[0].reset();
    });
 
    $('#addbutton').click(function(){
        var first = $('#productname').val();
        var last = $('#unit').val();
        var price = $('#price').val();
        if(first!='' && last!==''){
            var addForm = $('#addForm').serialize();
            $.ajax({
                type: 'POST',
                url: 'add.php',
                data: addForm,
                success:function(){
                    $('#addnew').modal('hide');
                    $('#addForm')[0].reset();
                    showTable();
                    $('#alert').slideDown();
                    $('#alerttext').text('Member Added Successfully');
                }
            });
        }
        else{
            alert('Please input both Fields')
        }
         
    });
    //
    //edit
$(document).on('click', '.edit', function(){
    var id = $(this).data('id'); 
    var productname = $('#productname'+id).text();
    var unit = $('#unit'+id).text(); 
    var price = $('#price'+id).text(); 
    var expired = $('#expired'+id).text();
    var inventory = $('#inventory'+id).text();
    var sales = $('#sales'+id).text();
    var image = $('#image'+id).text();
    
    $('#editmem').modal('show');
    
    $('#eid').val(id);
    $('#eproductname').val(productname);
    $('#eunit').val(unit);
    $('#eprice').val(price);
    $('#eexpired').val(expired);
    $('#einventory').val(inventory);
    $('#esales').val(sales);
    $('#eimage').val(image);
});

$('#editbutton').click(function(e){
    e.preventDefault(); // Prevent the default form submission
    
    var id = $('#eid').val();
    var editForm = $('#editForm').serialize();
    
    $.ajax({
        type: 'POST',
        url: 'edit.php',
        data: editForm + "&id=" + id,
        success: function(response){
            console.log(response);
            $('#editmem').modal('hide');
            $('#editForm')[0].reset();
            showTable();
            $('#alert').slideDown();
            $('#alerttext').text('Member Updated Successfully');
        }
    });
});

    //
    //delete
    $(document).on('click', '.delete', function(){
        var id = $(this).data('id');
        var productname = $('#productname'+id).text();
        $('#delmem').modal('show');
        $('#dname').text(productname);
        $('#delbutton').val(id);
    });
 
    $('#delbutton').click(function(){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'delete.php',
            data: {
                id: id,
            },
            success:function(){
                $('#delmem').modal('hide');
                showTable();
                $('#alert').slideDown();
                $('#alerttext').text('Member Deleted Successfully');
            }
        });
    });
 
});
 
function showTable(){
    $.ajax({
        type: 'POST',
        url: 'fetch.php',
        data: {
            fetch: 1
        },
        success:function(data){
            $('#table').html(data);
        }
    });
}
</script>
</body>
</html>