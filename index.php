<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/crapp.css">
    <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.css">
    <title>Home page</title>
</head>
<body class="bg-image">
    <?php require 'template/navbar.php';?> 

<!-- Texts -->
<div id="outer" class="text">
        <div id="inner" class="row">
            <div class="col-12">
                <p class="responsive-text">Find car repair shops near you</p>
                <h1 class="responsive-text">Find Your Perfect Car <br> <span>Repair Shop</span></h1>
            </div>
        </div>
    </div>
<!-- Texts -->

<!-- search bar -->
 <form action="">

<div class="search">

    <div class="row height d-flex justify-content-center align-items-center">

        <div class="col-md-8">

            <div class="search">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" class="form-control" placeholder="Find a shop">
                <button class="">Search</button>
            </div>
    
        </div>
  
    </div>
</div>

</form>
</body>
</html>