$(document).ready(function(){
    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
    });

});

function loadSupply(ID) {
    $.ajax({
        url: '../control/get-supply.php',
        type: 'GET',
        data: { id: ID },
        success: function(response) {
            let data = JSON.parse(response);
            $('#edit-id').val(data.ID);
            $('#edit-stock_no').val(data.stock_no);
            $('#edit-name').val(data.name);
            $('#edit-brand').val(data.brand);
            $('#edit-description').val(data.description);
            $('#edit-category').val(data.category);
            $('#edit-unit').val(data.unit);
            $('#edit-baseline').val(data.baseline);
        }
    });
}
function UpdateSupply(event) {
    event.preventDefault();

    $.ajax({
        type: 'POST',
        url: '../control/update-supply.php',
        data: $('#supplyFormEdit').serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.success);
                $('#edit-supply-modal-form').modal('hide');
                location.reload();
            } else {
                alert(response.error);
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('An error occurred while updating the supply.');
        }
    });
}
function AddSupply() {
    var supplyResult = $('.supplyResult');

    supplyResult.html('<div class="alert alert-info" align="center"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>');

    $.ajax({
        type: 'POST',
        url: '../control/add-supply.php',
        data: $('#supplyForm').serialize(),
        success: function(response) {
            alert('Successfully added supply! Thank you!');
            location.reload();
        }
    });

    setTimeout(function() {
        supplyResult.html('');
    }, 1000);
}