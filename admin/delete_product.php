<?php

if (isset($_GET['delete_products'])) {
    $delete_id = $_GET['delete_products'];

    $delete_pro = "delete from `product` where product_id = '$delete_id'";
    $result = mysqli_query($con,$delete_pro);

    if($result){
        echo "<script>alert('Product Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}

?>