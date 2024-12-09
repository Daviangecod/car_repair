<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container ">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
             
                <div class="container mt-4 bg-white border border-1 rounded p-4">
        <h1>Shop Management</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Shop Name</th>
                        <th>Website</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example data - Replace with dynamic data from your backend -->
                    <tr>
                        <td>1</td>
                        <td>Bob's Auto Repair</td>
                        <td><a href="https://www.bobsautorepair.com" target="_blank">www.bobsautorepair.com</a></td>
                        <td>123 Main St, Anytown</td>
                        <td>555-1212</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ace Auto Service</td>
                        <td></td>  <!-- Example of a shop without a website -->
                        <td>456 Oak Ave, Anytown</td>
                        <td>555-3434</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                         <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

        <!-- Add Shop Modal (Example) -->
        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#addShopModal">
            Add New Shop
        </button>

        <div class="modal fade" id="addShopModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Shop</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your form fields here -->
                        <form>
                            <div class="form-group">
                                <label for="shopName">Shop Name</label>
                                <input type="text" class="form-control" id="shopName" required>
                            </div>
                            <!-- Add other fields (website, address, phone, etc.) -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
            </div>
        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>