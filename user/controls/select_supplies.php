<?php
require '../../config/connection.php';
session_start(); // Ensure session is started

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode($_POST['supplies'], true);
    $user_id = $_SESSION['user_id']; // Get user ID from session

    if (!empty($data) && isset($user_id)) {
        $stmt = $conn->prepare("INSERT INTO tbl_withdrawals_dtl (stock_no, unit, description, userID) VALUES (?, ?, ?, ?)");

        foreach ($data as $supply) {
            $stmt->bind_param("ssss", $supply['stock_no'], $supply['unit'], $supply['description'], $user_id);
            $stmt->execute();
        }

        echo json_encode(["success" => true]);
        exit;
    }
}

echo json_encode(["success" => false]);
?>
