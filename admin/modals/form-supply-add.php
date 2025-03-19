<?php
    require_once '../config/connection.php';

    $sql = "SELECT position, abbreviation FROM tbl_positions ORDER BY position ASC";
    $result = $conn->query($sql);
?>
<div id="supply-modal-form" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Supply</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="supplyResult"></div>
                <form id="supplyForm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Stock No</label>
                                <input type="text" class="form-control" name="stock_no" id="stock_no" required placeholder="Enter Stock No">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Product Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" class="form-control" name="brand" id="brand" required placeholder="Enter Brand">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" id="description" required placeholder="Enter Description">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category" id="category" required>
                                    <option value="">Select Category</option>
                                    <option value="Office Stationery">Office Stationery</option>
                                    <option value="Writing Instruments">Writing Instruments</option>
                                    <option value="Filing and Organization">Filing and Organization</option>
                                    <option value="Office Equipment and Accessories">Office Equipment and Accessories</option>
                                    <option value="Desk Accessories">Desk Accessories</option>
                                    <option value="Adhesive and Fasteners">Adhesive and Fasteners</option>
                                    <option value="Office Furniture">Office Furniture</option>
                                    <option value="IT and Computer Accessories">IT and Computer Accessories</option>
                                    <option value="Janitorial and Cleaning Supplies">Janitorial and Cleaning Supplies</option>
                                    <option value="Security and Identification">Security and Identification</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Unit</label>
                                <select class="form-control" name="unit" id="unit" required>
                                    <option value="">Select Unit</option>
                                    <option value="Piece">Piece</option>
                                    <option value="Unit">Unit</option>
                                    <option value="Box">Box</option>
                                    <option value="Can">Can</option>
                                    <option value="Pack">Pack</option>
                                    <option value="Set">Set</option>
                                    <option value="Pad">Pad</option>
                                    <option value="Ream">Ream</option>
                                    <option value="Bottle">Bottle</option>
                                    <option value="Tube">Tube</option>
                                    <option value="Pair">Pair</option>
                                    <option value="Cartridge">Cartridge</option>
                                    <option value="Toner">Toner</option>
                                    <option value="Gallon">Gallon</option>
                                    <option value="Jar">Jar</option>
                                    <option value="Roll">Roll</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Baseline</label>
                                <input type="number" class="form-control" name="baseline" id="baseline" required placeholder="Enter Baseline">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary" onclick="AddSupply()">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>