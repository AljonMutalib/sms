<?php
include '../../config/connection.php';

if (isset($_POST['withdrawal_id'])) {
    $withdrawal_id = $_POST['withdrawal_id'];

    // Prepare SQL statement to update issuance_qty
    $stmt = $conn->prepare("UPDATE tbl_withdrawals SET stat = 1 WHERE ID = ?");
    $stmt->bind_param("i", $withdrawal_id);

    if ($stmt->execute()) {
        echo "Successfully issued supplies. Thank you!";
    } else {
        echo "Error updating record";
    }

    $stmt->close();
    $conn->close();
}
?>
