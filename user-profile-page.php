<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);
    $user_id = $user_data['id'];

    $query    = "SELECT * from purchased_products where user_id = '$user_id'";
    $result   = mysqli_query($con, $query);
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
    <title>Skywrath | My Profile</title>
</head>
<body>
    <div class="main-container user-profile">
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
                            <a class="nav-link" href="user-index-page.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-shop-page.php">Store Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-collection-page.php">Game Genre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-faq-page.php">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-custom-page.php">Custom</a>
                        </li>
                    </ul>
                </div>
                <div class="col-2 md-5">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bf4c41" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-cart-page.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bf4c41" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                                </svg>
                            </a>
                        </li>
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
        <div class="profile-content">
            <h3>You!</h3>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <p>Name: <span><?php echo $user_data['first_name'], " ", $user_data['last_name'];?></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Contact Number: <span><?php echo $user_data['contact_number'];?></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Address: <span><?php echo $user_data['address'];?></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Email: <span><?php echo $user_data['email'];?></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: right !important">
                        <button type="button" class="edit-profile-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-purchased-items">
            <h3>Bought Items:</h3>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <table class="table table-borderless align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Type</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Shipping Status</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Receive By</th>
                                </tr>
                            </thead>

                            <?php while($row = mysqli_fetch_array($result)){ ?>
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
                                        <td class="tbl-info"><?php echo $row['product_type'];?></td>
                                        <td class="tbl-info"><?php echo $row['product_name'];?></td>
                                        <td class="tbl-info"><?php echo $row['shipping_status'];?></td>
                                        <td class="tbl-info"><?php echo $row['product_quantity'];?></td>
                                        <td class="tbl-info">₱<?php echo $row['product_price'];?></td>
                                        <td class="tbl-info"><?php echo $row['payment_method'];?></td>
                                        <td class="tbl-info"><?php echo $row['receive_by'];?></td>
                                        <td class="tbl-info">
                                            <?php
                                                $pending_order = $row['shipping_status'];
                                                if ($pending_order == 'To Received Your Order'):
                                            ?>
                                                <form action="actions/user-order-update-function.php" method="post">
                                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                    <input type="hidden" name="shipping_status" value="<?php echo $row['shipping_status']; ?>">
                                                    <button type="submit" role="button" class="btn btn-success" style="font-size: 13px">Order Received</button>
                                                </form>
                                            <?php  else: ?>
                                                <button style="font-size: 13px" class="btn btn-primary" disabled="true">Order Received</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                </tbody>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit User Profile-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="actions/user-edit-profile-function.php" method="POST">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Your Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="profile-modal-container container">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $user_data['id']?>" id="floatingInput" placeholder="First Name">
                                        <input type="text" class="form-control" name="first_name" value="<?php echo $user_data['first_name']?>" id="floatingInput" placeholder="First Name">
                                        <label for="floatingInput">First Name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="last_name" value="<?php echo $user_data['last_name']?>" id="floatingInput" placeholder="Last Name">
                                        <label for="floatingInput">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" value="<?php echo $user_data['email']?>" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="contact_number" value="<?php echo $user_data['contact_number']?>" id="floatingInput" min="11" max="11" placeholder="contact number">
                                        <label for="floatingInput">Contact Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="address" value="<?php echo $user_data['address']?>" id="floatingInput" placeholder="address" required>
                                        <label for="floatingInput">Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary edit-profile-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" role="button" class="edit-profile-btn">Confirm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>