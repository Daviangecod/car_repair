<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<style>
        body { font-family: sans-serif; }
        .table-responsive { overflow-x: auto; }
        #staffForm{
            margin-bottom:20px;
        }
    </style>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Staff Management</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Staff Management</li>
                </ol>
             
    <div class="container border border-1 rounded bg-white p-4">
        <div id="message"></div>

        <div id="staffForm">
            <h2>Add New Staff Member</h2>
            <form id="newStaffForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select class="form-control" id="role">
                        <option value="Brake specialist">Brake specialist</option>
                        <option value="Automotive technician">Automotive technician</option>
                        <option value="Engine mechanic">Engine mechanic</option>
                        <option value="Tire technician">Tire technician</option>
                        <option value="Electrical system technician">Electrical system technician</option>
                        </select>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Staff</button>
            </form>
        </div><hr>

        <h2>Staff Members</h2>
        <div class="table-responsive">
            <table class="table table-bordered w-100" id="staffTable">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    </tbody>
            </table>
        </div>
    </div>

    <!-- <script>
        $('#newStaffForm').submit(function(event) {
            event.preventDefault();
            const name = $('#name').val();
            const email = $('#email').val();
            const role = $('#role').val();
            const password = $('#password').val();

            $.ajax({
                url: '/api/addStaff', // Your API endpoint to add staff
                type: 'POST',
                data: { name, email, role, password },
                dataType: 'json',
                success: function(response) {
                    $('#message').html('<div class="alert alert-' + (response.success ? 'success' : 'danger') + '">' + response.message + '</div>');
                    if (response.success) {
                        //Optionally, you could add the new staff member to the table here
                        $('#newStaffForm')[0].reset();
                    }
                },
                error: function(xhr, status, error) {
                    $('#message').html('<div class="alert alert-danger">Error adding staff member.</div>');
                    console.error("AJAX error:", error);
                }
            });
        });
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
            </div>
        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>