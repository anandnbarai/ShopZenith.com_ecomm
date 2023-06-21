<?php

//! including connection file
include('./includes/connect.php');


//! getting Products
function getproducts()
{
    global $con;

    //! condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

            $select_query = "select * from `product` order by rand() LIMIT 0,6";
            $result_query = mysqli_query($con, $select_query);
            // $row = mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : &#8377;$product_price</p>
                <a href='index.php?add_to_cart=$product_id ' class='btn btn-dark'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
            }
        }
    }
}


//! getting all products
function get_all_products()
{
    global $con;

    //! condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

            $select_query = "select * from `product` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            // $row = mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : &#8377;$product_price</p>
                <a href='index.php?add_to_cart=$product_id ' class='btn btn-dark'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
            }
        }
    }

}


//! getting unique categories
function get_unique_categories()
{
    global $con;

    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "select * from `product` where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>Sorry, No Product Available for this Category.!</h2>";
        }
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : &#8377;$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
        }
    }
}


//! getting unique brands
function get_unique_brands()
{
    global $con;

    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from `product` where brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>Sorry, No Product Available of this Brand!</h2>";
        }
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : &#8377;$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
        }
    }
}


//! Display brand in sidebar
function getbrands()
{
    global $con;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class=nav-item'><a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                </li>";
    }
}


//! Display category in sidebar
function getcategory()
{
    global $con;
    $select_categories = "select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $cateogry_id = $row_data['category_id'];
        echo " <li class='nav-item'>
        <a href='index.php?category=$cateogry_id' class='nav-link text-light'>$category_title</a>
    </li>";
    }
}


//! searching product
function search_product()
{
    global $con;

    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `product` where product_keyword like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>Sorry, No result Match.</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : &#8377;$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
        }
    }
}


//! View details function
function viewdetails()
{
    global $con;

    //! condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {

                $product_id = $_GET['product_id'];
                $select_query = "select * from `product` where product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];

                    echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : &#8377;$product_price</p>
                <a href='index.php?add_to_cart=$product_id ' class='btn btn-dark'>Add to Cart</a>
                <a href='index.php' class='btn btn-secondary'>Go Home</a>
            </div>
        </div>
    </div> 
    <div class='col-md-8'>
    <!-- Related Cards -->
    <div class='row'>
        <div class='col-md-12'>
            <h4 class='text-center text-info'>Related Products</h4>
        </div>
        <div class='col-md-6'>
            <img src='./admin/product_images/$product_image2' class='card-img-top'>
        </div>
        <div class='col-md-6'>
            <img src='./admin/product_images/$product_image3' class='card-img-top'>
        </div>
    </div>
</div>";
                }
            }
        }
    }
}


//!get ip address function
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;


//!cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values($get_product_id,'$get_ip_add',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


//! Funtion to get cart item number
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;

    //? The else condition in the cart_item() function is necessary because the if statement only executes if the add_to_cart GET variable is set. If the add_to_cart variable is not set, then the if statement will not execute, and the function will not count the number of cart items.If you remove the else condition, then the function will always execute the select query, even if the add_to_cart variable is not set. This will result in an error, because the select query will return no results if there are no cart items.
}

//!function to display total price in navbar
function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "select * from `cart_details` where ip_address = '$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "select * from `product` where product_id = '$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}
?>