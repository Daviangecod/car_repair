<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Shop websites</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Shop websites</li>
                </ol>
             
                <div class="container-fluid bg-white p-4 border border-1 rounded">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1>Shop Websites</h1>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addShopModal">
                    Add Shop Website
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Shop Name</th>
                                <th>Website URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="shopTableBody">
                            <!-- Shop data will be loaded here -->
                            <tr>
                                <td>1</td>
                                <td>Speedy Repairs</td>
                                <td><a href="https://www.speedyrepairs.com" target="_blank">https://www.speedyrepairs.com</a></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Shop Modal -->
    <div class="modal fade" id="addShopModal" tabindex="-1" aria-labelledby="addShopModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addShopModalLabel">Add New Shop Website</h5>
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
  
   
            </div>
        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>