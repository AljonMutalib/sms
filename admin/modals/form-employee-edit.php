<?php
    require_once '../config/connection.php';

    $sql = "SELECT position, abbreviation FROM tbl_positions ORDER BY position ASC";
    $result = $conn->query($sql);
?>
<div id="edit-employee-modal-form" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="employeeResult"></div>
                <form id="employeeFormEdit" onsubmit="UpdateEmployee(event)">
                    <div class="row">
                        <!-- First Name -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="edit-fname" id="edit-fname" required>
                                <input type="text" class="form-control" name="edit-id" id="edit-id" required hidden>
                            </div>
                        </div>
                        <!-- Middle Name -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="edit-mname" id="edit-mname" required>
                            </div>
                        </div>
                        <!-- Last Name -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="edit-lname" id="edit-lname" required>
                            </div>
                        </div>
                        <!-- Position -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Position</label>
                                <select class="form-control" name="edit-position" id="edit-position" required>
                                    <option value="">Select Position</option>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . htmlspecialchars($row['abbreviation']) . "'>" . htmlspecialchars($row['position']) . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Employment Status</label>
                                <select class="form-control" name="edit-employment" id="edit-employment" required>
                                    <option value="">Select Status</option>
                                    <option value="Regular">Regular/Plantilla</option>
                                    <option value="Job Order">Job Order</option>
                                </select>
                            </div>
                        </div>
                        <!-- Salary -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="number" class="form-control" name="edit-salary" id="edit-salary" required>
                            </div>
                        </div>
                        <!-- Division -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Division</label>
                                <select class="form-control" name="edit-division" id="edit-division" required>
                                    <option value="">Select Division</option>
                                    <option value="ORD">Office of the Regional Director</option>
                                    <option value="TOD">Technical Operations Division</option>
                                    <option value="AFD">Admin and Finance Division</option>
                                </select>
                            </div>
                        </div>
                        <!-- Province -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Province</label>
                                <select class="form-control" name="edit-province" id="edit-province" required>
                                    <option value="">Select Province</option>
                                    <option value="Zamboanga City">Zamboanga City</option>
                                    <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                                    <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                                    <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                                    <option value="Basilan">Basilan</option>
                                    <option value="Sulu">Sulu</option>
                                    <option value="Tawi-Tawi">Tawi-Tawi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary" onclick="UpdateEmployee()">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>