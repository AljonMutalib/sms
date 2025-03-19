<?php
session_start();
require '../config/connection.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
$user_id = $_SESSION['user_id'];
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['withdrawal_id'])) {
    $withdrawal_id = $_POST['withdrawal_id'];
    
    $sqlWithdrawal = $conn->prepare("SELECT ID, division, office, rcc, ris_no, sai_no, purpose FROM tbl_withdrawals WHERE ID = ?");
    $sqlWithdrawal->bind_param("i", $withdrawal_id);
    $sqlWithdrawal->execute();
    $result = $sqlWithdrawal->get_result()->fetch_assoc();   
    $sqlWithdrawal->close();
    
} else {
    echo "No supply ID provided.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICT Region IX and BASULTA - Supply</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php include 'navigations/sidebar.php'; ?>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php include 'navigations/topbar.php'; ?>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>New Withdrawal Form</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>New Withdrawal</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <a data-toggle="modal" class="btn btn-outline btn-success" href="#supply-modal-table"><i class="fa fa-cart-plus"></i></a>
                        <a class="btn btn-outline btn-primary" href="#" id="saveWithdrawalBtn" onclick="saveWithdrawal()"><i class="fa fa-save"></i></a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Requisition Details</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form id="withdrawalForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Division</label>
                                                <input type="text" class="form-control" value="<?php echo  $result['division']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Office</label>
                                                <input type="text" class="form-control" value="<?php echo  $result['office']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Responsibility Center Code</label>
                                                <input type="text" class="form-control" value="<?php echo  $result['rcc']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Responsibility Center Code</label>
                                                <input type="text" class="form-control" value="<?php echo  $result['ris_no']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Responsibility Center Code</label>
                                                <input type="text" class="form-control" value="<?php echo  $result['sai_no']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Purpose</label>
                                                <textarea class="form-control" rows="5" placeholder="Enter purpose" readonly><?php echo  $result['purpose']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Withdrawal</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-withdrawal" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Stock No</th>
                                                <th>Unit</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Requisition</th>
                                                <th width="12%">Issuance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT 
                                                    w.ID AS withdrawal_id, 
                                                    s.stock_no, 
                                                    s.unit, 
                                                    s.description, 
                                                    s.qty AS available_qty, 
                                                    w.requisition_qty, w.issuance_qty
                                                FROM tbl_withdrawals_dtl w
                                                INNER JOIN tbl_supplies s ON w.stock_no = s.stock_no
                                                WHERE w.withdrawal_ID = ?";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param("i", $withdrawal_id);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                $count = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $count++ . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['stock_no']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['unit']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                                    echo "<td align='center'>" . htmlspecialchars($row['available_qty']) . "</td>";
                                                    echo "<td align='center'>" . htmlspecialchars($row['requisition_qty']) . "</td>";
                                                    echo "<td align='center'><input type='number' class='form-control issuance-input' data-id='" . $row['withdrawal_id'] . "' data-available='" . $row['available_qty'] . "' value='" . htmlspecialchars($row['issuance_qty']) . "' value='0' onkeyup='validateQuantity(this)'></td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include 'navigations/footer.php'; ?>
        <?php include 'modals/table-supplies-add.php'; ?>
        </div>
    </div>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/plugins/dataTables/datatables.min.js"></script>
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>
    <script src="../js/plugins/iCheck/icheck.min.js"></script>
    <script src="functions/withdrawal.js"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-withdrawal').DataTable({
                pageLength: 10,
                responsive: true,
            });

        });
        function saveWithdrawal() {
            let purpose = $('#purpose').val().trim();
            if (purpose === '') {
                alert('Purpose is required.');
                $('#purpose').focus();
                return;
            }
            $.ajax({
                type: 'POST',
                url: 'controls/add-withdrawal.php',
                data: $('#withdrawalForm').serialize(),
                dataType: 'json', // Ensure response is treated as JSON
                success: function(response) {
                    if (response.success) {
                        alert(response.message); // Show success message from PHP
                        location = 'withdrawal.php'; // Redirect after success
                    } else {
                        alert('Error: ' + response.message); // Show error message from PHP
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText); // Show error details
                }
            });
        }

        $(document).ready(function() {
            $(".issuance-input").on("focusout", function() {
                let input = $(this);
                let withdrawalId = input.data("id");
                let availableQty = parseInt(input.data("available"));
                let issuanceQty = parseInt(input.val());

                // Validate input (ensure it's not greater than available)
                if (issuanceQty > availableQty) {
                    alert("Requisition quantity exceeds available stock!");
                    input.val(availableQty); // Reset to available qty
                    return;
                }

                // AJAX request to update the database
                $.ajax({
                    url: "controls/update_issuance.php",
                    type: "POST",
                    data: {
                        withdrawal_id: withdrawalId,
                        issuance_qty: issuanceQty
                    },
                    success: function(response) {
                        alert(response); // Log success message or handle UI update
                    },
                    error: function() {
                        alert("Failed to update requisition quantity.");
                    }
                });
            });
        });

    </script>
</body>
</html>
