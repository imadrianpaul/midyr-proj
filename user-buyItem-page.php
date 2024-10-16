<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);
    $user_data_id = $user_data['id'];

    $product_name = $_GET['product_name'];

    $query    = "SELECT * from products where product_name = '$product_name'";
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
    <title>Skywrath</title>
</head>
<body>
    <div class="main-container">
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
                            <a class="nav-link" href="#">Custom</a>
                        </li>
                    </ul>
                </div>
                <div class="col-2 md-5">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="user-profile-page.php">
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
        <div class="display-item">
            <div class="container">
                <?php while($row = mysqli_fetch_array($result)){ ?>
                    <div class="row">
                        <div class="col-5">
                            <div class="show-purchased-item">
                                <img src="css/images/shop-item-collections/<?php echo $row['product_image'];?>" alt="Image">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="product-info">
                                <h1><?php echo $row['product_name'];?></h1>
                                <h4 style="font-weight: 300; margin-bottom: 72px">₱<?php echo $row['product_price']?></h4>
                                <p style="margin-bottom: 72px"><?php echo $row['product_description']?></p>
                                <p style="margin-bottom: 72px">Please specify the quantity you ordered!</p>
                                <div class="row">
                                    <div class="col">
                                        <form action="actions/buy-item-function.php" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $user_data['id']?>">
                                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
                                            <input type="hidden" name="product_image" value="<?php echo $row['product_image']?>">
                                            <input type="hidden" name="product_name" value="<?php echo $row['product_name']?>">
                                            <input type="hidden" name="product_type" value="<?php echo $row['product_type']?>">
                                            <input type="hidden" name="product_price" value="<?php echo $row['product_price']?>">
                                            <input type="hidden" name="product_quantity" value="1">
                                            <input type="hidden" name="user_email" value="<?php echo $user_data['email']?>">
                                            <input type="hidden" name="phone_number" value="<?php echo $user_data['contact_number']?>">
                                            <input type="hidden" name="user_address" value="<?php echo $user_data['address']?>">

                                            <button type="button" style="margin-top: 76px;" class="btn btn-warning product-btn" data-bs-toggle="modal" data-bs-target="#modallAddCart<?php echo $row['product_id'];?>">Add to Cart</button>
                                            <button type="submit" role="button" class="btn btn-success product-btn" style="color: white; margin-top: 76px;">Buy Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php include 'modal/modal-addCart.php'; }?>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>