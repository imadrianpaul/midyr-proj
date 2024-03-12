<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);
    $user_name = $user_data['first_name'];
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
    <title>Skywrath | What's Up! <?php echo $user_name;?></title>
</head>
<body class="user-index">
    <div class="main-container user-landing-page">
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
                            <a class="nav-link" href="user-shop-page.php">Store Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-collection-page.php">Game Genre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-collection-page.php">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-custom-page.php">Custom</a>
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
        <div class="user-landing-page">
            <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="css/images/user-landing-page/11.png" class="d-block w-100" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img src="css/images/user-landing-page/12.png" class="d-block w-100" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img src="css/images/user-landing-page/13.png" class="d-block w-100" alt="Image">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="container-fluid">
            <div class="product-banner">
                <div class="row">
                    <div class="col">
                        <h2>Choose a game genre!</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 md-4">
                        <div class="product">
                            <img src="css/images/user-landing-page/products/11.png" alt="Image">
                            <h4>Action</h4>
                            <a class="btn btn-danger" href="user-bloom-collection.php" style="font-size: 11px; width: 160px; border-radius: 10px; background-color: #bf4c41">VIEW DETAILS</a>
                        </div>
                    </div>
                    <div class="col-4 md-4">
                        <div class="product">
                            <img src="css/images/user-landing-page/products/12.png" alt="Image">
                            <h4>RPG</h4>
                            <a class="btn btn-danger" href="user-appawrel-collection.php" style="font-size: 11px; width: 160px; border-radius: 10px; background-color: #bf4c41">VIEW DETAILS</a>
                        </div>
                    </div>
                    <div class="col-4 md-4">
                        <div class="product">
                            <img src="css/images/user-landing-page/products/13.png" alt="Image">
                            <h4>FPS</h4>
                            <a class="btn btn-danger" href="user-charm-collection.php" style="font-size: 11px; width: 160px; border-radius: 10px; background-color: #bf4c41">VIEW DETAILS</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-us">
                <div class="row">
                    <div class="col-6 md-6">
                        <div class="description-about">
                            <h4>#BeTheRank1Player</h4>
                            <p>Become the best one out there. Show them you're different by obtaining the Top 1 spot in the games listed. </p>
                        </div>
                    </div>
                    <div class="col-6 md-6">
                        <img src="css/images/user-landing-page/about-us/11.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer user-footer">
            <p>Be updated for the games that are yet to be added!</p>
            <form action="actions/add-email-function.php" method="post">
                <div class="input-group mb-3">
                    <input type="hidden" name="user_id" value="<?php echo $user_data['id']?>">
                    <input type="text" class="form-control" name="user_email" placeholder="Email address" aria-label="Email address" aria-describedby="basic-addon2" required>
                    <button type="submit" class="input-group-text" id="basic-addon2">Email</button>
                </div>
            </form>
        </div>
    </footer>

    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>