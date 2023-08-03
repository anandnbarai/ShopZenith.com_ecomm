<?php

if (isset($_GET['delete_order'])) {
    $delete_id = $_GET['delete_order'];

    $delete_order = "delete from `user_orders` where order_id = '$delete_id'";
    $result = mysqli_query($con,$delete_order);

    if($result){
        echo "<script>alert('Order History Deleted Successfully')</script>";
        echo "<script>window.open('index.php?all_orders','_self')</script>";
    }
}

?>