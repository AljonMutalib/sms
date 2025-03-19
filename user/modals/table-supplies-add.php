<div id="supply-modal-table" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Supply Masterlist</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="supplyResult"></div>
                <form id="supplyTable">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-supply" >
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Stock No</th>
                                        <th>Product Name</th>
                                        <th>Brand</th>
                                        <th>Description</th>
                                        <th>Unit</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require '../config/connection.php';

                                        // Get all stock_no values already in tbl_withdrawals_dtls
                                        $excluded_stock_nos = [];
                                        $exclude_query = "SELECT stock_no FROM tbl_withdrawals_dtl where withdrawal_ID = 0";
                                        $exclude_stmt = $conn->prepare($exclude_query);
                                        $exclude_stmt->execute();
                                        $exclude_result = $exclude_stmt->get_result();

                                        while ($row = $exclude_result->fetch_assoc()) {
                                            $excluded_stock_nos[] = "'" . $conn->real_escape_string($row['stock_no']) . "'";
                                        }

                                        // Convert array to a string for SQL query
                                        $excluded_stock_nos_str = implode(",", $excluded_stock_nos);

                                        // Modify the supply fetching query
                                        $sql = "SELECT ID, stock_no, name, brand, description, category, unit, qty, baseline 
                                                FROM tbl_supplies 
                                                WHERE qty > 0";

                                        // Add condition to exclude stock_nos if there are any
                                        if (!empty($excluded_stock_nos)) {
                                            $sql .= " AND stock_no NOT IN ($excluded_stock_nos_str)";
                                        }

                                        $sql .= " ORDER BY name ASC";

                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        $count = 1;

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr class='gradeX'>";
                                            echo "<td><input type='checkbox' class='i-checks supply-checkbox' 
                                                data-stock_no='" . htmlspecialchars($row['stock_no']) . "' 
                                                data-unit='" . htmlspecialchars($row['unit']) . "' 
                                                data-description='" . htmlspecialchars($row['description']) . "'></td>";
                                            echo "<td>" . $count++ . "</td>";
                                            echo "<td><h5>" . htmlspecialchars($row['stock_no']) . "</h5></td>";
                                            echo "<td><h5>" . htmlspecialchars($row['name']) . "</h5></td>";
                                            echo "<td><h5>" . htmlspecialchars($row['brand']) . "</h5></td>";
                                            echo "<td><h5>" . htmlspecialchars($row['description']) . "</h5></td>";
                                            echo "<td align='center'><h5>" . htmlspecialchars($row['unit']) . "</h5></td>";
                                            echo "<td align='center'><h5>" . htmlspecialchars($row['qty']) . "</h5></td>";
                                            echo "</tr>";
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary" onclick="AddSupplies()">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>