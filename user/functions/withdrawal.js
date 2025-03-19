$(document).ready(function(){
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
});
$(document).ready(function(){
    $('.dataTables-withdrawal').DataTable({
        pageLength: 10,
        responsive: true,
    });

});

$(document).ready(function(){
    $('.dataTables-supply').DataTable({
        pageLength: 10,
        responsive: true,
    });

});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function () {
            let withdrawalId = this.getAttribute("data-id");

            if (confirm("Are you sure you want to remove this withdrawal?")) {
                fetch("controls/delete_supply.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "withdrawal_id=" + withdrawalId
                })
                .then(response => response.text())
                //.then(data => {
                  //  if (data.trim() === "success") {
                    //    alert("Successfully removed supply. Thank you!");
                      //  location.reload(); // Refresh the page to reflect changes
                    //} else {
                      //  alert("Error deleting withdrawal.");
                    //}
               // })
                .catch(error => console.error("Error:", error));
            }
        });
    });
});


function validateQuantity(input) {
    let availableQty = parseInt(input.getAttribute("data-available"));
    let enteredQty = parseInt(input.value);

    if (enteredQty > availableQty) {
        alert("Requisition quantity cannot exceed available quantity!");
        input.value = availableQty; // Reset to max available quantity
    }
}

function AddSupplies() {
    let checkedSupplies = [];

    $(".supply-checkbox:checked").each(function () {
        let supply = {
            stock_no: $(this).data("stock_no"),
            unit: $(this).data("unit"),
            description: $(this).data("description"),
        };
        checkedSupplies.push(supply);
    });

    if (checkedSupplies.length === 0) {
        alert("Please select at least one item.");
        return;
    }

    $.ajax({
        url: "controls/select_supplies.php",
        type: "POST",
        data: { supplies: JSON.stringify(checkedSupplies) },
        dataType: "json",
        success: function (response) {
            if (response.success) {
                alert("Successfully selected item(s). Thank you!");
                location.reload(); // Refresh the page to update the list
            } else {
                alert("Error saving supplies.");
            }
        },
        error: function () {
            alert("AJAX request failed.");
        },
    });
}

$(document).ready(function() {
    function toggleSaveButton() {
        let allValid = true; // Assume all rows are valid initially

        $(".dataTables-withdrawal tbody tr").each(function() {
            let requisitionQty = parseFloat($(this).find(".requisition-input").val()) || 0;

            // If any row has requisitionQty = 0 or empty, disable the button
            if (requisitionQty === 0) {
                allValid = false;
                return false; // Stop checking further rows
            }
        });

        // Disable button if any row has requisitionQty = 0
        $("#saveWithdrawalBtn").toggleClass("disabled", !allValid);
    }

    // Run check when the page loads
    toggleSaveButton();

    // Event: When requisition input value changes dynamically
    $(document).on("input", ".requisition-input", function() {
        toggleSaveButton();
    });

    // Event: When a row is deleted
    $(document).on("click", ".delete-btn", function() {
        $(this).closest("tr").remove();
        toggleSaveButton();
    });

    // Ensure check after DataTable loads (if using AJAX)
    setTimeout(toggleSaveButton, 1000);
});

