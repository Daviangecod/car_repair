<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Customers</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Customers</li>
                </ol>
             
<style>
.table-responsive { overflow-x: auto; }
</style>

    <div class="container bg-white rounded p-4 border border-1">

    <div class="row">
            <div class="col-md-12">
                <div id="customerForm">
            <h2>Add New Customer</h2>
            <form id="newCustomerForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone">
                </div>
                <div class="form-group">
                    <label for="vehicleID">Vehicle ID:</label>
                    <input type="text" class="form-control" id="vehicleID">
                </div><br>
                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div><br>

        <h2>Customers</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Vehicle ID</th>
                    </tr>
                </thead>
                <tbody>
                        <td>67890</td>
                        <td>Jane Smith</td>
                        <td>Brake issue</td>
                        <td>2024-03-10</td>
                    <!-- Customer data will be added here -->
                </tbody>
            </table>
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