<?php
include '../../config/connection.php';

if (isset($_POST['withdrawal_id'], $_POST['issuance_qty'])) {
    $withdrawal_id = $_POST['withdrawal_id'];
    $issuance_qty = $_POST['issuance_qty'];

    // Prepare SQL statement to update issuance_qty
    $stmt = $conn->prepare("UPDATE tbl_withdrawals_dtl SET issuance_qty = ? WHERE ID = ?");
    $stmt->bind_param("ii", $issuance_qty, $withdrawal_id);

    if ($stmt->execute()) {
        echo "Successfully updated issuance quantity. Thank you!";
    } else {
        echo "Error updating record";
    }

    $stmt->close();
    $conn->close();
}
?>
