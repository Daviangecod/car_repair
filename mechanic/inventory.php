<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>
<style>
        
        body { font-family: sans-serif; }
        .table-responsive { overflow-x: auto; }
        .btn-yellow { background-color: #ffc107; color: #fff; border: none; }
        .form-control{
            width: 150px;
        }
        .full-width-table {
            width: 100%;
        }

    </style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Inventory</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Inventory</li>
                </ol>
            </div>
    <div class="container-fluid p-4 m-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="searchInput">Search Inventory:</label>
                    <input type="text" class="form-control" id="searchInput" onkeyup="filterTable()" placeholder="Enter a description">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered col-md-10" id="inventoryTable">
                        <thead>
                            <tr>
                                <th>Vehicle</th>
                                <th>Customer</th>
                                <th>Part Number</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Unit Cost</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BMW</td>
                                <td>Davinci</td>
                                <td>12345</td>
                                <td>Spark Plugs</td>
                                <td>10</td>
                                <td>5000fcfa</td>
                                <td><button class="btn btn-sm btn-warning">Edit</button> <button class="btn btn-sm btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td>BMW</td>
                                <td>Davinci</td>
                                <td>67890</td>
                                <td>Oil Filter</td>
                                <td>20</td>
                                <td>10000fcfa</td>
                                <td><button class="btn btn-sm btn-warning">Edit</button> <button class="btn btn-sm btn-danger">Delete</button></td>
                            </tr>
                             <tr>
                                <td>BMW</td>
                                <td>Davinci</td>
                                <td>13579</td>
                                <td>Brake Pads</td>
                                <td>5</td>
                                <td>25000fcfa</td>
                                <td><button class="btn btn-sm btn-warning">Edit</button> <button class="btn btn-sm btn-danger">Delete</button></td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-yellow mt-3" data-toggle="modal" data-target="#addItemModal">Add Item</button>

                <!-- Add Item Modal -->
                <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addItemModalLabel">Add Inventory Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="partNumber">Vehicle:</label>
                                        <input type="text" class="form-control" id="vehicle" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="partNumber">Customer:</label>
                                        <input type="text" class="form-control" id="customer" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="partNumber">Part Number:</label>
                                        <input type="text" class="form-control" id="partNumber" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <input type="text" class="form-control" id="description" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity:</label>
                                        <input type="number" class="form-control" id="quantity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="unitCost">Unit Cost:</label>
                                        <input type="number" step="0.01" class="form-control" id="unitCost" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save Item</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6">
             Add other sections as needed (e.g., low stock alerts, reports, etc.)
                <h2>Low Stock Alerts</h2>
                <ul>
                    <li>Part Number: 13579 - Brake Pads (Low Stock)</li>
                    </ul>
            </div> -->
        </div>
    </div>

    <script>
        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const tableRows = document.querySelectorAll('#inventoryTable tbody tr');

            tableRows.forEach(row => {
                const partNumber = row.cells[0].textContent.toLowerCase();
                const description = row.cells[1].textContent.toLowerCase();
                const isMatch = searchTerm === '' || partNumber.includes(searchTerm) || description.includes(searchTerm);
                row.style.display = isMatch ? '' : 'none';
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>