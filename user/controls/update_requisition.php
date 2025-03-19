<?php
include '../../config/connection.php';

if (isset($_POST['withdrawal_id'], $_POST['requisition_qty'])) {
    $withdrawal_id = $_POST['withdrawal_id'];
    $requisition_qty = $_POST['requisition_qty'];

    // Prepare SQL statement to update requisition_qty
    $stmt = $conn->prepare("UPDATE tbl_withdrawals_dtl SET requisition_qty = ? WHERE ID = ?");
    $stmt->bind_param("ii", $requisition_qty, $withdrawal_id);

    if ($stmt->execute()) {
        echo "Successfully updated requisition quantity. Thank you!";
    } else {
        echo "Error updating record";
    }

    $stmt->close();
    $conn->close();
}
?>
