<?php

$con = mysqli_connect('localhost', 'root', '', 'shopzenith');

// if ($con) {
//     echo "connection successful";
// } else {
//     die(mysqli_error($con));
// }

if (!$con) {
    die(mysqli_error($con));
}
?>