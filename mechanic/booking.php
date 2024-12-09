<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Bookings</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Bookings</li>
                </ol>
             
                <div class="container bg-white p-4 border border-1 rounded">
                    <h1>List of bookings</h1><br>
                    <div class="form-group mb-3">
            <input type="text" class="form-control" id="searchInput" placeholder="Search by Client Name or Vehicle ID">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Client Name</th>
                        <th>Vehicle ID</th>
                        <th>Issue Description</th>
                        <th>Requested Date</th>
                        <th>Requested Time</th>
                        <th>Scheduled Date</th>
                        <th>Scheduled Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1001</td>
                        <td>John Doe</td>
                        <td>ABC-123</td>
                        <td>Engine light on</td>
                        <td>2024-03-15</td>
                        <td>10:00 AM</td>
                        <td>2024-03-18</td>
                        <td>2:00 PM</td>
                        <td>Scheduled</td>
                    </tr>
                    <tr>
                        <td>1002</td>
                        <td>Jane Smith</td>
                        <td>DEF-456</td>
                        <td>Brake squeal</td>
                        <td>2024-03-16</td>
                        <td>2:00 PM</td>
                        <td>2024-03-20</td>
                        <td>9:00 AM</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>1003</td>
                        <td>Peter Jones</td>
                        <td>GHI-789</td>
                        <td>Tire change</td>
                        <td>2024-03-17</td>
                        <td>11:00 AM</td>
                        <td>2024-03-17</td>
                        <td>3:00 PM</td>
                        <td>In progress</td>
                    </tr>
                    <!-- Add more rows as needed -->
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