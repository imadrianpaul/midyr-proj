<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);

    $query      = "SELECT * FROM products";
    $stock_result     = mysqli_query($con, $query);

    // Count Pending Orders
    function count_pending_products() {
        include("actions/database-connect.php");
        $query      = "SELECT * FROM purchased_products WHERE shipping_status = 'Pending'";
        $rows       = mysqli_query($con, $query);
        $total_rows = mysqli_num_rows($rows);
        return $total_rows;
    }

    $pending_products = count_pending_products('Pending');

    // Count Preparing Orders
    function count_preparing_products() {
        include("actions/database-connect.php");
        $query      = "SELECT * FROM purchased_products WHERE shipping_status = 'Preparing Your Order'";
        $rows       = mysqli_query($con, $query);
        $total_rows = mysqli_num_rows($rows);
        return $total_rows;
    }

    $preparing_products = count_preparing_products('Preparing Your Order');

    // Count To Ship Orders
    function count_to_ship_products() {
        include("actions/database-connect.php");
        $query      = "SELECT * FROM purchased_products WHERE shipping_status = 'To Ship Your Order'";
        $rows       = mysqli_query($con, $query);
        $total_rows = mysqli_num_rows($rows);
        return $total_rows;
    }

    $to_ship_products = count_to_ship_products('To Ship Your Order');

    // Count To Receive Orders
    function count_to_received_products() {
        include("actions/database-connect.php");
        $query      = "SELECT * FROM purchased_products WHERE shipping_status = 'To Received Your Order'";
        $rows       = mysqli_query($con, $query);
        $total_rows = mysqli_num_rows($rows);
        return $total_rows;
    }

    $to_received_products = count_to_received_products('To Received Your Order');

    // Count Received Orders
    function count_received_products() {
        include("actions/database-connect.php");
        $query      = "SELECT * FROM purchased_products WHERE shipping_status = 'Order Received'";
        $rows       = mysqli_query($con, $query);
        $total_rows = mysqli_num_rows($rows);
        return $total_rows;
    }

    $received_products = count_received_products('Order Received');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="css/images/logo/logo-favicon.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Skywrath | Admin</title>
</head>
<body class="admin-index">
    <div class="main-container admin-landing-page">
        <div class="default-navbar">
            <div class="row">
                <div class="col-2 md-2">
                    <a class="navbar-brand" href="#">
                        <img src="css/images/logo/logo.png" alt="logo" width="48" height="48">
                    </a>
                </div>
                <div class="col-8 md-5">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-product-page.php">Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-orders-page.php">Orders</a>
                        </li>
                    </ul>
                </div>
                <div class="col-2 md-5">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="actions/logout-function.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bf4c41" class="bi bi-power" viewBox="0 0 16 16">
                                    <path d="M7.5 1v7h1V1h-1z"/>
                                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="admin-text">
            <h3>You'll be the best you could ever be.</h3>
        </div>
        <div class="admin-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="data-box">
                            <h1><?php echo $pending_products;?></h1>
                            <p>Total Number of Pending Orders</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="data-box">
                            <h1><?php echo $preparing_products;?></h1>
                            <p>Total Number of Preparing Orders</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="data-box">
                            <h1><?php echo $to_ship_products;?></h1>
                            <p>Total Number of To Ship Orders</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="data-box">
                            <h1><?php echo $to_received_products;?></h1>
                            <p>Total Number of To Receive Orders</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="data-box">
                            <h1><?php echo $received_products;?></h1>
                            <p>Total Number of To Received Orders</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="item-stocks">
                            <h4>Items with below 30 stocks:</h4>
                            <div class="container">
                                <table class="table table-borderless align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Stock</th>
                                            <th scope="col">Add Stock</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        while ($row = mysqli_fetch_array($stock_result)) {
                                            if($row['product_stock'] < 10){
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php 
                                                        $get_image = $row['product_image'];

                                                        if($row['product_name'] == "Multiple Item") {
                                                            echo    '<div>
                                                                        <img style="border-radius: 9px; box-shadow: 6px 7px 11px 3px #646464;" height="120px;" src="css/images/logo/logo.png"></img>
                                                                    </div>';
                                                        }
                                                        else {
                                                            echo    '<div>
                                                                        <img style="border-radius: 9px; box-shadow: 6px 7px 11px 3px #646464;" height="120px;" src="css/images/shop-item-collections/'.$get_image.'"></img>
                                                                    </div>';
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php echo $row['product_name'];?></td>
                                                <td><?php echo $row['product_stock'];?></td>
                                                <td style="padding: 0">
                                                    <form action="actions/add-stock-function.php" method="post">
                                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                                                        <input type="hidden" name="product_stock" value="<?php echo $row['product_stock'];?>">
                                                        <button type="submit" role="button" class="add-fifty-stock btn">+50</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php }} ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>