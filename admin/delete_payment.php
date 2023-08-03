<?php

if (isset($_GET['delete_payment'])) {
    $delete_id = $_GET['delete_payment'];

    $delete_payment = "delete from `user_payments` where payment_id = '$delete_id'";
    $result = mysqli_query($con,$delete_payment);

    if($result){
        echo "<script>alert('Payment History Deleted Successfully')</script>";
        echo "<script>window.open('index.php?all_payments','_self')</script>";
    }
}

?>