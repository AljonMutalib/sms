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
                    <h2>List of Supplies</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Supplies</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Common Supplies</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Stock No</th>
                                                <th>Product Name</th>
                                                <th>Brand</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Unit</th>
                                                <th>Quantity</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT ID, stock_no, name, brand, description, category, unit, qty, baseline FROM tbl_supplies";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                $count = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    if ($row['qty'] == 0) {
                                                        $remark = "Out of Stock";
                                                        $color = "label-danger";
                                                    } elseif ($row['qty'] <= $row['baseline'] && $row['qty'] > 0) {
                                                        $remark = "Restock";
                                                        $color = "label-warning-light";
                                                    } else {
                                                        $remark = "Sufficient";
                                                        $color = "label-success";
                                                    }
                                                    echo "<tr class='gradeX'>";
                                                    echo "<td>" . $count++ . "</td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['stock_no']) . "</h5></td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['name']) . "</h5></td>";
                                                    echo "<td><h5>" . htmlspecialchars($row['brand']) . "</h5></td>";
                                                    echo "<td><h6>" . htmlspecialchars($row['description']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($row['category']) . "</h6></td>";
                                                    echo "<td align='center'><h6>" . htmlspecialchars($row['unit']) . "</h6></td>";
                                                    echo "<td align='center'><h5>" . htmlspecialchars($row['qty']) . "</h5></td>";
                                                    echo "<td><h5><span class='label ".$color."'>" . htmlspecialchars($remark) . "</span/</h5></td>";
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
    <script src="functions/supply.js"></script>
</body>
</html>
