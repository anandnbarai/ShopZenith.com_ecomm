<?php

if (isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];

    $delete_user = "delete from `user_table` where user_id = '$delete_id'";
    $result = mysqli_query($con,$delete_user);

    if($result){
        echo "<script>alert('User Data Deleted Successfully')</script>";
        echo "<script>window.open('index.php?all_users','_self')</script>";
    }
}

?>