<?php

include("../includes/connect.php");

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    // Select data from database
    $select_query = "select * from `brands` where brand_title='$brand_title'";
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select);
    
    if ($number > 0) {
        echo "<script>alert('This brand is present inside the database.')</script>";
    } else {
        $insert_query = "insert into `brands` (brand_title) values('$brand_title')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('brand has been insterted succefully')</script>";
        }
    }
}

?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert Brands" name="brand_title" aria-label="brands"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-dark text-white border-0 p-2 my-3" value="Insert Brands" name="insert_brand"
            aria-label="Username" aria-describedby="basic-addon1">
    </div>
</form>