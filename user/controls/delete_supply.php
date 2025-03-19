<?php
require '../../config/connection.php'; // Include database connection
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["withdrawal_id"])) {
    $withdrawal_id = $_POST["withdrawal_id"];

    $sql = "DELETE FROM tbl_withdrawals_dtl WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $withdrawal_id);

    if ($stmt->execute()) {
        echo "success"; // Send success response to JavaScript
    } else {
        echo "error"; // Send error response to JavaScript
    }

    $stmt->close();
    $conn->close();
}
?>
