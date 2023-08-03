<?php

if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];

    $delete_cat = "delete from `categories` where category_id = '$delete_id'";
    $result = mysqli_query($con,$delete_cat);

    if($result){
        echo "<script>alert('Category Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>";
    }
}

?>