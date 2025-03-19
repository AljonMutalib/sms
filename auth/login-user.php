<?php
session_start();

// Include your database connection
require_once '../config/connection.php';  // Assuming you have a file for DB connection

// Check if the form is submitted via POST (AJAX or regular form submission)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize the user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Check if both fields are not empty
    if (!empty($username) && !empty($password)) {

        // Prepare SQL query to fetch user data from database
        $query = "SELECT * FROM tbl_employees WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password using password_verify
            if (password_verify($password, $user['password'])) {

                // Password is correct, start the session and redirect
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['position'] = $user['position'];
                $_SESSION['division'] = $user['division'];
                $_SESSION['province'] = $user['province'];
                echo "success";  // Return success for AJAX
                exit();  // Exit to prevent further code execution
            } else {
                // Incorrect password
                echo "Invalid username or password!";
            }
        } else {
            // No user found with that username
            echo "Invalid username or password!";
        }
    } else {
        echo "Please fill in both fields!";
    }
}
