<?php

include '../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and validate inputs
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $fname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
    $mname = isset($_POST['mname']) ? trim($_POST['mname']) : '';
    $lname = isset($_POST['lname']) ? trim($_POST['lname']) : '';
    $position = isset($_POST['position']) ? trim($_POST['position']) : '';
    $salary = isset($_POST['salary']) ? floatval($_POST['salary']) : 0.0;
    $division = isset($_POST['division']) ? trim($_POST['division']) : '';
    $province = isset($_POST['province']) ? trim($_POST['province']) : '';
    $employment = isset($_POST['employment']) ? trim($_POST['employment']) : '';

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username already exists
    $checkUser = $conn->prepare("SELECT id FROM tbl_employees WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        echo 'Error: Username already exists!';
    } else {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO tbl_employees (username, password, fname, mname, lname, position, salary, division, province, employment) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssdsss", $username, $hashed_password, $fname, $mname, $lname, $position, $salary, $division, $province, $employment);

        if ($stmt->execute()) {
            echo 'Employee added successfully!';
        } else {
            echo 'Error: ' . $stmt->error;
        }

        $stmt->close();
    }

    $checkUser->close();
    $conn->close();
}
?>
