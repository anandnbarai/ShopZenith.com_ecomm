<?php

include('includes/connect.php');
include('functions/common_function.php');
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ShopZenith.com - Unleash your shopping potential</title>
    <link rel="icon" type="image/x-icon" href="img/Yellow E-commerce Shop Bag Store Logo.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <!-- Boostrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boostrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="overflow-x:hidden">
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark">
            <div class="container-fluid">
                <img src="img/Yellow E-commerce Shop Bag Store Logo.png" class="logo"></img>

                <!-- Button Shown when website convert into mobile view, responsive website button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- data-bs-target and id in div must be same to work responsive button,in this :example navbarSupportedContent -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Contact</a>
                        </li>
                        <?php

                        if (!isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
                                    <a class='nav-link text-white' href='user/user_register.php'>Register</a></a>
                                </li>";
                        }

                        ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup>&nbsp;Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Total Price : <b class='text-white'></b>&#8377;
                                    <?php total_cart_price(); ?>
                                </b></a>
                        </li>
                    </ul>
                    <!-- d-flex means display flex which means come in horizontal row-->
                    <form class="d-flex" action="" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                        <input type="submit" value="Search" class='btn btn-outline-dark text-dark bg-light'
                            name="search_data_product">
                    </form>
                </div>
                <ul class="navbar-nav me-auto">
                    <?php

                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                                    <a class='nav-link text-white' href='user/user_login.php'>Welcome Guest!</a>
                                        </li>";
                    } else {
                        echo "<li class='nav-item'>
                                    <a class='nav-link text-white' href='user/profile.php'>Welcome <b class='text-white'>" . $_SESSION['username'] . "</b></a>
                                        </li>";
                    }

                    ?>

                    <?php

                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                                <a class='nav-link text-white' href='user/user_login.php'>Login!</a>
                                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                                <a class='nav-link text-white' href='user/logout.php'>Log Out</a>
                                    </li>";
                    }

                    ?>
                </ul>
            </div>
        </nav>

        <!-- Third Child-->
        <div class="bg-light p-2">
            <h3 class="text-center mt-2">ShopZenith.com</h3>
            <p class="text-center">Unleash Your Shopping Potential </p>
        </div>

        <!-- forth child -->
        <div class="row px-1">
            <div class="col-md-10">
                <!-- Product -->
                <div class="row">
                    <?php
                    search_product();
                    get_unique_categories();
                    get_unique_brands();
                    ?>
                    <!-- row end -->
                </div>
                <!-- col end -->
            </div>
            <!-- SideNav -->
            <div class="col-md-2 bg-secondary p-0 bg-secondary">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item text-light bg-dark">
                        <a href="#" class="nav-link text-white text-light">
                            <h4>Assosiated Brands</h4>
                        </a>
                    </li>
                    <?php
                    getbrands();
                    ?>
                </ul>
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item text-light bg-dark">
                        <a href="#" class="nav-link text-white text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                    getcategory();
                    ?>
                </ul>
            </div>
        </div>

        <!-- Footer/Last child -->
        <!-- Include footer -->
        <?php
        include("./includes/footer.php");
        ?>
    </div>

</body>

</html>