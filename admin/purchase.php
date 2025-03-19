<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICT Region IX and BASULTA - Purchase</title>
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
                    <h2>List of Purchase</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Purchase</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <a data-toggle="modal" class="btn btn-outline btn-success" href="#supply-modal-form"><i class="fa fa-print"></i></a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Purchase</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-Purchase" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Stock No</th>
                                                <th>Product Name</th>
                                                <th>Unit</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Amount</th>
                                                <th>Period</th>
                                                <th>Date Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                require '../config/connection.php';

                                                $sqlPur = $conn->prepare("SELECT s.ID, s.stock_no, s.name, s.unit, p.qty, p.unit_cost, p.amount, p.month, p.year, p.date_created FROM tbl_supplies s INNER JOIN tbl_purchases p ON s.stock_no = p.stock_no ORDER BY p.ID DESC");
                                                $sqlPur->execute();
                                                $result = $sqlPur->get_result();
                                                $count = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr class='gradeX'>";
                                                    echo "<td>" . $count++ . "</td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['stock_no']) . "</h5></td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['name']) . "</h5></td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['unit']) . "</h5></td>";
                                                    echo "<td align='center'><h5>" . htmlspecialchars($row['qty']) . "</h5></td>";
                                                    echo "<td align='right'><h5>" . htmlspecialchars(number_format($row['unit_cost'],2)) . "</h5></td>";
                                                    echo "<td align='right'><h5>" . htmlspecialchars(number_format($row['amount'],2)) . "</h5></td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['month']) . " " . htmlspecialchars($row['year']) . "</h5></td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['date_created']) . "</h5></td>";
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
        $(document).ready(function(){
            $('.dataTables-Purchase').DataTable({
                pageLength: 25,
                responsive: true,
            });
        });
    </script>
</body>
</html>
