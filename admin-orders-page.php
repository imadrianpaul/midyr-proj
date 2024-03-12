<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);

    $query      = "SELECT * FROM purchased_products";
    $result     = mysqli_query($con, $query);
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
<body>
    <div class="main-container admin-orders-page">
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
                            <a class="nav-link" href="admin-index-page.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-product-page.php">Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Orders</a>
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
        <div class="orders">
            <h1>Orders</h1>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <table class="table table-borderless align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Product Ordered</th>
                                    <th scope="col">User Email</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Shipping Status</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <?php while ($row = mysqli_fetch_array($result)) {?>
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
                                        <td><?php echo $row['user_email'];?></td>
                                        <td><?php echo $row['product_quantity'];?></td>
                                        <td>₱<?php echo ($row['product_price']);?></td>
                                        <td><?php echo $row['shipping_status'];?></td>
                                        <td>
                                            <button type="button" class="btn-edit" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php include 'modal/modal-edit-status.php'; } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>