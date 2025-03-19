<?php

include '../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and validate inputs
    $stock_no = isset($_POST['stock_no']) ? trim($_POST['stock_no']) : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $brand = isset($_POST['brand']) ? trim($_POST['brand']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $category = isset($_POST['category']) ? trim($_POST['category']) : '';
    $unit = isset($_POST['unit']) ? trim($_POST['unit']) : '';
    $baseline = isset($_POST['baseline']) ? trim($_POST['baseline']) : '';
    
    // Check if username already exists
    $checkUser = $conn->prepare("SELECT id FROM tbl_supplies WHERE name = ?");
    $checkUser->bind_param("s", $name);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        echo 'Error: Username already exists!';
    } else {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO tbl_supplies (stock_no, name, brand, description, category, unit, baseline) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $stock_no, $name, $brand, $description, $category, $unit, $baseline);  

        if ($stmt->execute()) {
            echo 'Supply added successfully!';
        } else {
            echo 'Error: ' . $stmt->error;
        }

        $stmt->close();
    }

    $checkUser->close();
    $conn->close();
}
?>
