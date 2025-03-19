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
$employee_id = $_SESSION['user_id'];
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
                    <h2>List of Withdrawals</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Withdrawal</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <a class="btn btn-outline btn-success" href="withdrawal-form.php"><i class="fa fa-cart-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Requisition and Issue Slip</h5>
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
                                            <tr align="center">
                                                <th>#</th>
                                                <th>Employee Name</th>
                                                <th>Office</th>
                                                <th>Division</th>
                                                <th>Res. Center Code</th>
                                                <th>RIS No</th>
                                                <th>SAI No</th>
                                                <th>Purpose</th>
                                                <th>Remarks</th>
                                                <th>Function</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sqlreq = "SELECT 
                                                    w.ID AS withdrawal_id, 
                                                    w.office, 
                                                    w.division, 
                                                    w.rcc, 
                                                    w.ris_no, 
                                                    w.sai_no, 
                                                    w.purpose,
                                                    e.fname, 
                                                    e.mname, 
                                                    e.lname 
                                                    FROM tbl_withdrawals w 
                                                    INNER JOIN tbl_employees e 
                                                    ON w.employee_ID = e.ID 
                                                    WHERE w.stat=0";
                                                $stmtReq = $conn->prepare($sqlreq);
                                                $stmtReq->execute();
                                                $resultReq = $stmtReq->get_result();

                                                $count = 1;
                                                while ($rowReq = $resultReq->fetch_assoc()) {
                                                    if ($rowReq['stat'] == 0) {
                                                        $remark = "Requested";
                                                    }
                                                    echo "<tr class='gradeX'>";
                                                    echo "<td>" . $count++ . "</td>";
                                                    echo "<td><h5>" . htmlspecialchars($rowReq['fname']) . " " . htmlspecialchars($rowReq['mname']) . " " . htmlspecialchars($rowReq['lname']) . "</h5></td>";
                                                    echo "<td><h6>" . htmlspecialchars($rowReq['office']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($rowReq['division']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($rowReq['rcc']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($rowReq['ris_no']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($rowReq['sai_no']) . "</h6></td>";
                                                    echo "<td align='center'><h6>" . htmlspecialchars($rowReq['purpose']) . "</h6></td>";
                                                    echo "<td><h5><span class='label label-success'>" . htmlspecialchars($remark) . "</span/</h5></td>";
                                                    echo '<td align="center">
                                                            <form action="withdrawal-details.php" method="POST" style="display:inline;">
                                                                <input type="hidden" name="withdrawal_id" value="'.$rowReq['withdrawal_id'].'">
                                                                <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-folder"></i></button>
                                                            </form>
                                                        </td>';
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
