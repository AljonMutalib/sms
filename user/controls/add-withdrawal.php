<?php
session_start();
include '../../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'User not authenticated']);
        exit();
    }

    // Sanitize and validate inputs
    $division = isset($_POST['division']) ? trim($_POST['division']) : '';
    $office = isset($_POST['office']) ? trim($_POST['office']) : '';
    $purpose = isset($_POST['purpose']) ? trim($_POST['purpose']) : '';
    $rcc = isset($_POST['rcc']) ? trim($_POST['rcc']) : '';
    $employeeID = $_SESSION['user_id'];

    // Validate required fields
    if (empty($division) || empty($office) || empty($purpose) || empty($rcc)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    $response = [];

    // Insert withdrawal record
    $sql = "INSERT INTO tbl_withdrawals (division, office, purpose, employee_ID, rcc) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $division, $office, $purpose, $employeeID, $rcc);

    if ($stmt->execute()) {
        $last_id = $conn->insert_id; // Get the last inserted ID

        // Format ID as a 3-digit number
        $formatted_id = str_pad($last_id, 3, '0', STR_PAD_LEFT);
        $current_year = date('Y');
        $current_month = date('m');

        // Generate ris_no and sai_no
        $ris_no = "R9BST-RIS-$current_year-$current_month-$formatted_id";
        $sai_no = "R9BST-SAI-$current_year-$current_month-$formatted_id";

        // Update the record with ris_no and sai_no
        $update_sql = "UPDATE tbl_withdrawals SET ris_no = ?, sai_no = ? WHERE ID = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssi", $ris_no, $sai_no, $last_id);

        if ($update_stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Successfully submitted withdrawal. Thank you!';
            $response['ris_no'] = $ris_no;
            $response['sai_no'] = $sai_no;

            // Update withdrawal details
            $update_dtl = "UPDATE tbl_withdrawals_dtl SET withdrawal_ID = ? WHERE userID = ? and withdrawal_ID = 0";
            $update_stmt_dtl = $conn->prepare($update_dtl);
            $update_stmt_dtl->bind_param("ii", $last_id, $employeeID);

            if ($update_stmt_dtl->execute()) {
                $response['details_message'] = 'Withdrawal details updated successfully!';
            } else {
                $response['details_error'] = 'Error updating withdrawal details: ' . $update_stmt_dtl->error;
            }
            $update_stmt_dtl->close();
        } else {
            $response['success'] = false;
            $response['message'] = 'Error updating ris_no and sai_no: ' . $update_stmt->error;
        }

        $update_stmt->close();
    } else {
        $response['success'] = false;
        $response['message'] = 'Error inserting withdrawal: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
}
?>
