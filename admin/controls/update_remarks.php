<?php
include '../../config/connection.php';

if (isset($_POST['withdrawal_id'], $_POST['remarks'])) {
    $withdrawal_id = $_POST['withdrawal_id'];
    $remarks = $_POST['remarks'];

    // Prepare SQL statement to update issuance_qty
    $stmt = $conn->prepare("UPDATE tbl_withdrawals_dtl SET issuance_remarks = ? WHERE ID = ?");
    $stmt->bind_param("si", $remarks, $withdrawal_id);

    if ($stmt->execute()) {
        echo "Successfully updated remarks. Thank you!";
    } else {
        echo "Error updating record";
    }

    $stmt->close();
    $conn->close();
}
?>
