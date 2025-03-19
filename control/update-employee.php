<?php
require '../config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $id = intval($_POST['edit-id']); // Ensure ID is an integer
    $fname = htmlspecialchars(trim($_POST['edit-fname']));
    $mname = htmlspecialchars(trim($_POST['edit-mname']));
    $lname = htmlspecialchars(trim($_POST['edit-lname']));
    $position = htmlspecialchars(trim($_POST['edit-position']));
    $employment = htmlspecialchars(trim($_POST['edit-employment']));
    $salary = floatval($_POST['edit-salary']); // Ensure salary is a valid number
    $division = htmlspecialchars(trim($_POST['edit-division']));
    $province = htmlspecialchars(trim($_POST['edit-province']));

    // Check if required fields are filled
    if (empty($fname) || empty($lname) || empty($position) || empty($employment) || empty($division) || empty($province)) {
        echo json_encode(["error" => "All fields are required"]);
        exit();
    }

    // Update employee in database
    $sql = "UPDATE tbl_employees SET fname=?, mname=?, lname=?, position=?, employment=?, salary=?, division=?, province=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssdssi", $fname, $mname, $lname, $position, $employment, $salary, $division, $province, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Employee updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update employee"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>
