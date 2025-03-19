<?php

include '../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stock_no = isset($_POST['stock_no']) ? trim($_POST['stock_no']) : '';
    $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 0; // Ensure qty is integer
    $unit_cost = isset($_POST['unit_cost']) ? trim($_POST['unit_cost']) : '';
    $amount = isset($_POST['amount']) ? trim($_POST['amount']) : '';
    $month = isset($_POST['month']) ? trim($_POST['month']) : '';
    $year = isset($_POST['year']) ? trim($_POST['year']) : '';

    $conn->begin_transaction(); // Start transaction

    try {
        // Insert into tbl_purchases
        $sql = "INSERT INTO tbl_purchases (stock_no, qty, unit_cost, amount, month, year) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siddss", $stock_no, $qty, $unit_cost, $amount, $month, $year);

        if (!$stmt->execute()) {
            throw new Exception('Error inserting into tbl_purchases: ' . $stmt->error);
        }
        $stmt->close();

        // Update stock in tbl_supplies
        $update_sql = "UPDATE tbl_supplies SET qty = qty + ? WHERE stock_no = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("is", $qty, $stock_no);

        if (!$update_stmt->execute()) {
            throw new Exception('Error updating tbl_supplies: ' . $update_stmt->error);
        }
        $update_stmt->close();

        $conn->commit(); // Commit transaction
        echo 'Supply added and stock updated successfully!';
    } catch (Exception $e) {
        $conn->rollback(); // Rollback transaction if error occurs
        echo 'Transaction failed: ' . $e->getMessage();
    }

    $conn->close();
}
?>
