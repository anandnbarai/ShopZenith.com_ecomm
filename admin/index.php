<?php

include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Dashbaord | ShopZenith - Unleash your shopping potential</title>
    <link rel="icon" type="image/x-icon" href="../img/Yellow E-commerce Shop Bag Store Logo.png">
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
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }

        .logo {
            width: 3%;
            height: 2%;
        }

        .product_image {
            width: 10%;
            object-fit: contain;
        }
    </style>
</head>

<body style="overflow-x:hidden">
    <!-- navbar -->
    <div class="container-fluid p-0 border-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-dark text-white bg-dark">
            <div class="container-fluid">
                <img src="../img/Yellow E-commerce Shop Bag Store Logo.png" class="logo">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">Welcome Admin!</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link text-white' href='user/logout.php'>Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="bg-light p-2">
            <h3 class="text-center mt-2">ShopZenith.com</h3>
            <p class="text-center">Unleash Your Shopping Potential </p>
        </div>

        <!-- Second Child -->
        <!-- <div class="bg-light mt-2">
            <h3 class="text-center p-2">
                Manage Details
            </h3>
        </div> -->

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex me-auto align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../img/client-img.png" class="admin_image"></img></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center p-5">
                    <!-- button*10>a.nav-link.text-light.bg-dark text-white. -->
                    <button class=""><a href="index.php?in_pro" class="nav-link text-dark bg-dark text-white">Insert
                            Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-dark bg-dark text-white">
                            View Prodcuts</a></button>
                    <button><a href="index.php?in_cat" class="nav-link text-dark bg-dark text-white ">
                            Insert Category</a></button>
                    <button><a href="" class="nav-link text-dark bg-dark text-white ">
                            View Category</a></button>
                    <button><a href="index.php?in_brand" class="nav-link text-dark bg-dark text-white ">
                            Insert Brand</a></button>
                    <button><a href="" class="nav-link text-dark bg-dark text-white ">View
                            Brand</a></button>
                    <button><a href="" class="nav-link text-dark bg-dark text-white ">All
                            Orders</a></button>
                    <button><a href="" class="nav-link text-dark bg-dark text-white ">All
                            Payments</a></button>
                    <button><a href="" class="nav-link text-dark bg-dark text-white ">List
                            Users</a></button>
                </div>
            </div>

            <!-- fourth child -->
            <div class="container my-3 px-5">
                <?php

                if (isset($_GET['in_pro'])) {
                    include('in_pro.php');
                }
                if (isset($_GET['in_cat'])) {
                    include('in_cat.php');
                }

                if (isset($_GET['in_brand'])) {
                    include('in_brand.php');
                }

                if (isset($_GET['view_products'])) {
                    include('view_products.php');
                }

                if (isset($_GET['edit_products'])) {
                    include('edit_products.php');
                }
                ?>
            </div>

            <?php

            include("../includes/footer.php");

            ?>
</body>

</html>