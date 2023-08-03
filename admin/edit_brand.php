<?php

if (isset($_GET['edit_brand'])) {
    $edit_id = $_GET['edit_brand'];
    $get_data = "select * from `brands` where brand_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);

    $brand_title = $row['brand_title'];
}

?>
<div class="continer mt-3">
    <h2 class="text-center">
        Edit Brand
    </h2>
    <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Brand Title</label>
            <input type="text" id="brand_title" name="brand_title" value="<?php echo $brand_title; ?>"
                class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_brand" value="Update Brand" class="bg-dark text-white border-0 p-2 my-3">
        </div>
    </form>
</div>
<?php

if (isset($_POST['edit_brand'])) {
    $brand_title = $_POST['brand_title'];

    $update_brand = "update `brands` set brand_title='$brand_title' where brand_id = $edit_id";
    $result_update = mysqli_query($con, $update_brand);

    if ($result_update) {
        echo "<script>alert('Brand Updated Successfully')</script>";
        echo "<script>window.open('index.php?view_brand','_self')</script>";
    }
}

?>