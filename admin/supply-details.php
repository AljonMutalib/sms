<?php
session_start();

require '../config/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['supply_id'])) {
    $supply_id = $_POST['supply_id'];
    
    $sql = $conn->prepare("SELECT ID, stock_no, name, brand, description, category, unit, qty FROM tbl_supplies WHERE ID = ?");
    $sql->bind_param("i", $supply_id);
    $sql->execute();
    $result = $sql->get_result()->fetch_assoc();   
    $sql->close();
    
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
                    <h2>Supply Details</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="supply.php"><strong>Supplies</strong></a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Details</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <a data-toggle="modal" class="btn btn-outline btn-success" href="#inventory-modal-form"><i class="fa fa-cart-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Product Details</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stock Number</label>
                                            <input type="text" class="form-control" value="<?php echo $result['stock_no']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" value="<?php echo $result['name']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <input type="text" class="form-control" value="<?php echo $result['brand']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control" value="<?php echo $result['description']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input type="text" class="form-control" value="<?php echo $result['category']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <input type="text" class="form-control" value="<?php echo $result['unit']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" class="form-control" value="<?php echo $result['qty']?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Purchase(s)</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-Inventory" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Stock No</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Amount</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                $sqlPur = $conn->prepare("SELECT ID, stock_no, qty, unit_cost, amount, month, year FROM tbl_purchases WHERE stock_no = ? ORDER BY ID DESC");
                                                $sqlPur->bind_param("s", $result['stock_no']);
                                                $sqlPur->execute();
                                                $resultPur = $sqlPur->get_result();

                                                $count = 1;
                                                while ($row = $resultPur->fetch_assoc()) {
                                                    echo "<tr class='gradeX'>";
                                                    echo "<td>" . $count++ . "</td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['stock_no']) . "</h5></td>";
                                                    echo "<td align='center'><h5>" . htmlspecialchars($row['qty']) . "</h5></td>";
                                                    echo "<td align='right'><h5>" . htmlspecialchars(number_format($row['unit_cost'],2)) . "</h5></td>";
                                                    echo "<td align='right'><h5>" . htmlspecialchars(number_format($row['amount'],2)) . "</h5></td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['month']) . "</h5></td>";
                                                    echo "<td align='center'><h5>" . htmlspecialchars($row['year']) . "</h5></td>";
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
            <div id="inventory-modal-form" class="modal fade" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Supply</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="inventoryResult"></div>
                            <form id="inventoryForm">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stock No</label>
                                            <input type="text" class="form-control" name="stock_no" id="stock_no" value="<?php echo $result['stock_no']?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" name="qty" id="qty" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Unit Cost</label>
                                            <input type="number" class="form-control" name="unit_cost" id="unit_cost" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>amount</label>
                                            <input type="text" class="form-control" name="amount" id="amount" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Month</label>
                                            <select class="form-control" name="month" id="month" required>
                                                <option value="">Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Year</label>
                                            <select class="form-control" name="year" id="year" required>
                                                <option value="">Select Year</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary" onclick="AddInventory()">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php include 'navigations/footer.php'; ?>
        </div>
    </div>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/plugins/dataTables/datatables.min.js"></script>
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>
    <script>
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function(){
            $('.dataTables-Inventory').DataTable({
                pageLength: 10,
                responsive: true,
            });
        });
        
        document.addEventListener("DOMContentLoaded", function () {
            const qtyInput = document.getElementById("qty");
            const unitCostInput = document.getElementById("unit_cost");
            const amountInput = document.getElementById("amount");

            function calculateAmount() {
                let qty = parseFloat(qtyInput.value) || 0;
                let unitCost = parseFloat(unitCostInput.value) || 0;
                let amount = qty * unitCost;
                amountInput.value = amount.toFixed(2);
            }

            qtyInput.addEventListener("input", calculateAmount);
            unitCostInput.addEventListener("input", calculateAmount);
        });

        function AddInventory() {
            event.preventDefault();
            var inventoryResult = $('.inventoryResult');

            inventoryResult.html('<div class="alert alert-info" align="center"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>');

            $.ajax({
                type: 'POST',
                url: '../control/add-inventory.php',
                data: $('#inventoryForm').serialize(),
                success: function(response) {
                    alert('Successfully added inventory! Thank you!');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error + '\nStatus: ' + status + '\nResponse: ' + xhr.responseText);
                    console.error('AJAX Error:', status, error, xhr.responseText);
                }
            });

            setTimeout(function() {
                inventoryResult.html('');
            }, 1000);
        }
    </script>
</body>
</html>
