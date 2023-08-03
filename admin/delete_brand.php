<?php

if (isset($_GET['delete_brand'])) {
    $delete_id = $_GET['delete_brand'];

    $delete_brand = "delete from `brands` where brand_id = '$delete_id'";
    $result = mysqli_query($con,$delete_brand);

    if($result){
        echo "<script>alert('Brand Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_brand','_self')</script>";
    }
}

?>