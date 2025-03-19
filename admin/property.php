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
    <title>DICT Region IX and BASULTA - Property</title>
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
                    <h2>List of Properties</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Property</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <a data-toggle="modal" class="btn btn-outline btn-success" href="#employee-modal-form"><i class="fa fa-user-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Employee</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#" class="dropdown-item">Config option 1</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th><h5>#</h5></th>
                                                <th><h5>Acquired</h5></th>
                                                <th><h5>ICS No</h5></th>
                                                <th><h5>Property No</h5></th>
                                                <th><h5>Serial</h5></th>
                                                <th><h5>Classification</h5></th>
                                                <th><h5>Description</h5></th>
                                                <th><h5>Cost</h5></th>
                                                <th><h5>Condition</h5></th>
                                                <th><h5>Function</h5></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                require '../config/connection.php';

                                                $sql = "SELECT ID, date_acquired, ics_no, ics_date, property_no, asset_class, serial_no, description, unit_cost, cond, date_created FROM tbl_properties";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                $count = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr class='gradeX'>";
                                                    echo "<td>" . $count++ . "</td>";
                                                    echo "<td><h6>" . htmlspecialchars($row['date_acquired']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($row['ics_no']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($row['property_no']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($row['serial_no']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($row['asset_class']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($row['description']) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars(number_format($row['unit_cost'],2)) . "</h6></td>";
                                                    echo "<td><h6>" . htmlspecialchars($row['cond']) . "</h6></td>";
                                                    echo '<td>
                                                            <button class="btn btn-outline btn-success" type="button"><i class="fa fa-folder"></i></button>
                                                            <a href="#leave-modal-form" class="btn btn-outline btn-primary" data-toggle="modal" onclick="loadEmployee('.$row['ID'].')"><i class="fa fa-plus"></i></a>
                                                            <a href="#edit-employee-modal-form" class="btn btn-outline btn-warning" data-toggle="modal" onclick="loadEmployee('.$row['ID'].')"><i class="fa fa-edit"></i></a>
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
        <?php include 'modals/form-employee-add.php'; ?>
        <?php include 'modals/form-employee-edit.php'; ?>
        <?//php include 'modals/form-leave-credit.php'; ?>
        </div>
    </div>
    <!-- Mainly scripts -->
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
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

        function loadEmployee(ID) {
            $.ajax({
                url: '../control/get-employee.php',
                type: 'GET',
                data: { id: ID },
                success: function(response) {
                    let data = JSON.parse(response);
                    $('#edit-id').val(data.ID);
                    $('#edit-fname').val(data.fname);
                    $('#edit-mname').val(data.mname);
                    $('#edit-lname').val(data.lname);
                    $('#edit-position').val(data.position);
                    $('#edit-employment').val(data.employment);
                    $('#edit-salary').val(data.salary);
                    $('#edit-division').val(data.division);
                    $('#edit-province').val(data.province);
                }
            });
        }
        function UpdateEmployee(event) {
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: '../control/update-employee.php',
                data: $('#employeeFormEdit').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert(response.success);
                        $('#edit-employee-modal-form').modal('hide');
                        location.reload();
                    } else {
                        alert(response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while updating the employee.');
                }
            });
        }
        function AddEmployee() {
            event.preventDefault();
            var password = $('#password').val();
            var retype_password = $('#retype_password').val();
            var employeeResult = $('.employeeResult');

            employeeResult.html('<div class="alert alert-info" align="center"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>');

            if (password != retype_password) {
                employeeResult.html('<div class="alert alert-info" align="center">Password do not match!</div>');
            } else {
                $.ajax({
                    type: 'POST',
                    url: '../control/add-employee.php',
                    data: $('#employeeForm').serialize(),
                    success: function(response) {
                        alert('Successfully added Employee! Thank you!');
                        location.reload();
                    }
                });
            }
            setTimeout(function() {
                employeeResult.html('');
            }, 1000);
        }
    </script>
</body>
</html>
