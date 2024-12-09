<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-white mb-4">
                            <div class="card-body"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#baca28" fill="none">
                                    <path d="M11 6L21 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M11 12L21 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M11 18L21 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M3 7.39286C3 7.39286 4 8.04466 4.5 9C4.5 9 6 5.25 8 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3 18.3929C3 18.3929 4 19.0447 4.5 20C4.5 20 6 16.25 8 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> Items</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link text-decoration-none" href="Items.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-white mb-4">
                            <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#baca28" fill="none">
                                <path d="M17 2V5M7 2V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13 3.5H11C7.22876 3.5 5.34315 3.5 4.17157 4.67157C3 5.84315 3 7.72876 3 11.5V14C3 17.7712 3 19.6569 4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284C21 19.6569 21 17.7712 21 14V11.5C21 7.72876 21 5.84315 19.8284 4.67157C18.6569 3.5 16.7712 3.5 13 3.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.5 8.5H20.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9 15.5C9 15.5 10.5 16 11 17.5C11 17.5 13.1765 13.5 16 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>Total Bookings</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link text-decoration-none" href="booking.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-white mb-5">
                            <div class="card-body"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#baca28" fill="none">
                                <path d="M5.5 3.5L5.5 14.5C5.5 18.2133 8.18503 21 12 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M18.5 20.5L18.5 9.5C18.5 5.78672 15.815 3 12 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 18C21 18 19.1588 20.5 18.5 20.5C17.8412 20.5 16 18 16 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8 5.50022C8 5.50022 6.15878 3.00025 5.49998 3.00024C4.84118 3.00024 3 5.50024 3 5.50024" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>Resolved Issues</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link text-decoration-none" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- <i class="fas fa-chart-area me-1"></i> -->
                               Overall sales
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Sales report
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#baca28" fill="none">
                            <path d="M11.5 22H10.0796C7.74664 22 6.58014 22 5.76809 21.2752C4.95603 20.5505 4.75097 19.3264 4.34085 16.8781L3.17786 9.93557C2.98869 8.8063 2.89411 8.24167 3.18537 7.87083C3.47662 7.5 4.01468 7.5 5.09079 7.5H18.9092C19.9853 7.5 20.5234 7.5 20.8146 7.87083C21.1059 8.24167 21.0113 8.8063 20.8221 9.93557L20.1413 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M14 20.3333C14 20.3333 14.875 20.3333 15.75 22C15.75 22 18.5294 17.8333 21 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 7.5V7C7 4.23858 9.23858 2 12 2C14.7614 2 17 4.23858 17 7V7.5" stroke="currentColor" stroke-width="1.5" />
                            <path d="M4.5 17.5H11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>Recent orders
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Username</th>
                                    <th>Order date</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Customers</th>
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                    <th>Number</th>
                                    <th>Username</th>
                                    <th>Order date</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Customers</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Davinci</td>
                                    <td>10-08-2024</td>
                                    <td>Pending</td>
                                    <td>20000 FCFA</td>
                                    <td>Ebenda Davida</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>