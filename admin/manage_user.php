<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<style>
      .table-responsive {
        overflow-x: auto; /* Add horizontal scroll if needed */
      }
    </style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">User management</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">User management</li>
                </ol>
             
                <div class="container-fluid bg-white p-4 border border-1 rounded">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1>Users</h1>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    Add User
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive" >
                    <table class="table table-striped" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <!-- User data will be loaded here -->
                            <tr>
                              <td>1</td>
                              <td>John Doe</td>
                              <td>john.doe@example.com</td>
                              <td>Admin</td>
                              <td>Active</td>
                              <td>
                                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                              </td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Jane Smith</td>
                              <td>jane.smith@example.com</td>
                              <td>Mechanic</td>
                              <td>Active</td>
                              <td>
                                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                              </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role">
                                <option value="admin">Admin</option>
                                <option value="mechanic">Mechanic</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>
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