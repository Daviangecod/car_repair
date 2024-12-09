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
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
             
                <div class="container  bg-white p-4 border border-1 rounded mt-4">

        <h2>Shop Management</h2>
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
                    <!-- Shop data -->
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
                    <!-- Add more shop rows -->
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#addShopModal">
            Add New Shop
        </button>
        
        <div class="modal fade" id="addShopModal" tabindex="-1" aria-labelledby="addShopModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addShopModal">Add New Shop Website</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addShopForm">
                        <div class="mb-3">
                            <label for="shopName" class="form-label">Shop Name</label>
                            <input type="text" class="form-control" id="shopName" required>
                        </div>
                        <div class="mb-3">
                            <label for="websiteUrl" class="form-label">Website URL</label>
                            <input type="url" class="form-control" id="websiteUrl" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Shop</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  <hr> 

        <h2>Mechanic Management</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Specialization</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example mechanic data -->
                    <tr>
                        <td>1</td>
                        <td>Davinci</td>
                        <td>Davinci@email.com</td>
                        <td>67584334455</td>
                        <td>Engine Repair</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <!-- Add more mechanic rows -->
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#addMechanicModal">
            Add New Mechanic
        </button>

        <div class="modal fade" id="addMechanicModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Mechanic</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="mechanicName">Name</label>
                                <input type="text" class="form-control" id="mechanicName" required>
                            </div>
                            <div class="form-group">
                                <label for="mechanicEmail">Email</label>
                                <input type="email" class="form-control" id="mechanicEmail" required>
                            </div>
                            <!-- Add other fields (phone, specialization, etc.) -->
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