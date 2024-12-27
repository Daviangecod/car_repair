<?php $pageTitle = "All Booking Appointments"; ?>

<?php $mechanicPath = dirname(__DIR__, 1); ?>

<?php require_once $mechanicPath .'/templates/header.php' ?>
<?php require_once $mechanicPath . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>

<?php 
    $userId = $_SESSION['loginId'];
    $shops = [];
    $shopBookings = [];

    $query = "SELECT * FROM shops WHERE user_id = $userId";
    $result = mysqli_query($connection, $query);
    $shops = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(count($shops) > 0) {

        $bookings = [];
        $query = "SELECT * FROM bookings ORDER BY id DESC";
        $result = mysqli_query($connection, $query);
        $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);
        

        foreach($shops as $shop) {

            foreach($bookings as $booking) {

                if($shop['id'] == $booking['shop_id']){
                    array_push($shopBookings, $booking);
                }
                
            }
        }
    }
    
    
?>



<div id="layoutSidenav">

    <?php require_once $mechanicPath . '/templates/sidebar.php' ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?= ucwords($pageTitle) ?></li>
                </ol>
              
            
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="fs-6">Booking Appointements</h2> 
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Shop</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Service</th>
                                    <th>Preferred Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Shop</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Service</th>
                                    <th>Preferred Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php if(isset($shopBookings) && count($shopBookings) > 0): ?>

                                    <?php foreach($shopBookings as $booking): ?>
                                        
                                        <tr class="text-center">
                                            <td><?= $booking['name'] ?></td>
                                            <td><?= getShop($booking['shop_id'])['name'] ?></td>
                                            <td><?= $booking['phone_number'] ?></td>            
                                            <td><?= $booking['email'] ?></td>            
                                            <td>
                                                <?php if ($booking['status'] == PENDING): ?>
                                                 <span class='badge bg-warning text-dark'>pending</span>
                                                <?php elseif($booking['status'] == CONFIRMED): ?>
                                                    <span class='badge bg-success text-white'>confirmed</span>
                                                <?php elseif($booking['status'] == DECLINED): ?>
                                                    <span class='badge bg-danger text-white'>declined</span>
                                                <?php endif ?>
                                            </td>
                                            <td><?= $booking['service'] ?></td>
                                            <td><?= $booking['preferred_date'] ?></td>
                                            <td>
                                                <a href="<?= baseUrl('mechanic/booking/view.php', ['id' => $booking['id']]) ?>" class="btn btn-sm btn-primary">View</a>

                                                <a href="<?= baseUrl('mechanic/booking/delete.php', ['id' => $booking['id']]) ?>" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
              
            </div>
        </main>
        <?php require_once $mechanicPath . '/templates/copyright.php' ?>
    </div>
</div>

<?php require_once notification('error') ?>
<?php require_once notification('success') ?>
<?php require_once notification('info') ?>
<?php require_once notification('warning') ?>

<?php require_once $mechanicPath . '/templates/footer.php' ?>