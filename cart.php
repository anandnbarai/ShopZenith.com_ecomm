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
    <title>Shopping Cart | ShopZenith.com</title>

    <!-- Website logo -->
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
    <style>
        /* #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
        } */

        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .qty {
            object-fit: contain;
        }
    </style>
</head>

<body style="overflow-x:hidden">
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-dark text-white bg-dark">
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
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup>&nbsp;Cart</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav me-auto">
                    <?php

                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                                <a class='nav-link' href='user/user_login.php'>Welcome Guest!</a>
                                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                                <a class='nav-link' href='user/profile.php'>Welcome " . ucfirst($_SESSION['username']) . "</a>
                                    </li>";
                    }

                    ?>

                    <?php

                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                                    <a class='nav-link' href='user/user_login.php'>Login!</a>
                                        </li>";
                    } else {
                        echo "<li class='nav-item'>
                                    <a class='nav-link' href='user/logout.php'>Log Out</a>
                                        </li>";
                    }

                    ?>
                </ul>
            </div>
        </nav>

        <!-- calling cart funtion -->
        <?php
        cart();
        ?>
        <!-- Second Child/2nd Navbar -->
        <div class="bg-light p-2">
            <h3 class="text-center mt-2">ShopZenith.com</h3>
            <p class="text-center">Unleash Your Shopping Potential </p>
        </div>


        <!-- cart table -->
        <div class="container">
            <div class="row">
                <form method="post">
                    <table class="table table-bordered text-center">

                        <!-- php code to display dynamic data -->
                        <?php

                        global $con;
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "select * from `cart_details` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {

                            echo "<thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove Product</th>
                                    <th colspan='2'>Operation</th>
                                </tr>
                            </thead>
                            <tbody>";

                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "select * from `product` where product_id = '$product_id'";
                                $result_products = mysqli_query($con, $select_products);

                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;

                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $product_title; ?>
                                        </td>
                                        <td><img src="img/<?php echo $product_image1; ?>" class="cart_img"></td>
                                        <?php

                                        $get_ip_add = getIPAddress();

                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "update `cart_details` set quantity = $quantities where ip_address = '$get_ip_add'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }
                                        ?>
                                        <td><input type="text" name="qty" class="form-input w-50"></td>

                                        <td>
                                            <?php echo "<b>&#8377;$price_table</b>"; ?>
                                        </td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                                        <td>
                                            <!-- <button class="bg-dark text-white border-0 px-3 py-2 mx-3">Update</button> -->
                                            <input type="submit" class="bg-dark text-white border-0 px-3 py-2 mx-3"
                                                value="Update Cart" name="update_cart">
                                            <!-- <button class="bg-secondary text-white border-0 p-3 py-2">Remove</button> -->
                                            <input type="submit" class="bg-secondary text-white border-0 p-3 py-2"
                                                value="Remove Cart" name="remove_cart">
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger mt-3 mb-3'><b>Cart is Empty</b></h2>";
                        }
                        ?>
                        </tbody>
                    </table>

                    <!-- Subtotal -->
                    <div class="d-flex mb-5">

                        <?php
                        $get_ip_add = getIPAddress();
                        $cart_query = "select * from `cart_details` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<h4 class='px-3'>Subtotal : <strong class='text-dark'><b>&#8377;$total_price</b></strong></h4>
                            <input type='submit' class='bg-dark text-white border-0 p-3 px-3 py-2 border-0 mx-3' value='Continue Shopping' 
                            name='continue_shopping'>
                            <button class='bg-secondary text-white border-0 p-3 py-2'>
                            <a href='user/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                        } else {
                            echo "<input type='submit' class='bg-dark text-white border-0 p-3 px-3 py-2 border-0 mx-3' value='Continue Shopping' 
                                name='continue_shopping'>";
                        }

                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- function to remove item -->
        <?php

        function remove_cart_item()
        {
            global $con;

            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "delete from `cart_details` where product_id =$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }

        $remove_item = remove_cart_item();

        ?>
        <?php

        include('includes/footer.php');

        ?>
    </div>

</body>

</html>