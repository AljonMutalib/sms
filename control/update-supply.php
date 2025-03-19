<?php
require '../config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = intval($_POST['edit-id']);
    $stock_no = htmlspecialchars(trim($_POST['edit-stock_no']));
    $name = htmlspecialchars(trim($_POST['edit-name']));
    $brand = htmlspecialchars(trim($_POST['edit-brand']));
    $description = htmlspecialchars(trim($_POST['edit-description']));
    $category = htmlspecialchars(trim($_POST['edit-category']));
    $unit = htmlspecialchars(trim($_POST['edit-unit']));
    $baseline = intval($_POST['edit-baseline']);

    if (empty($stock_no) || empty($name) || empty($brand) || empty($description) || empty($category) || empty($unit) || empty($baseline)) {
        echo json_encode(["error" => "All fields are requireds"]);
        exit();
    }

    $sql = "UPDATE tbl_supplies SET stock_no=?, name=?, brand=?, description=?, category=?, unit=?, baseline=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssii", $stock_no, $name, $brand, $description, $category, $unit, $baseline, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Supply updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update supply"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>
