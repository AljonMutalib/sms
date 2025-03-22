function validateQuantity(input) {
    let availableQty = parseInt(input.getAttribute("data-available"));
    let enteredQty = parseInt(input.value);

    if (enteredQty > availableQty) {
        alert("Requisition quantity cannot exceed available quantity!");
        input.value = availableQty; // Reset to max available quantity
    }
}


