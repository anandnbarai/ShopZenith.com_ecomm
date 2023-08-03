<?php

if (isset($_GET['edit_products'])) {

    $edit_id = $_GET['edit_products'];
    $get_data = "select * from `product` where product_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);

    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keyword = $row['product_keyword'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    //!To display category in category dropdown
    $select_category = "select * from `categories` where category_id = $category_id";
    $result_cat = mysqli_query($con, $select_category);
    $row_cat = mysqli_fetch_assoc($result_cat);
    $category_name = $row_cat['category_title'];

    //!To display brand in brand dropown
    $select_brand = "select * from `brands` where brand_id = $brand_id";
    $result_brand = mysqli_query($con, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_name = $row_brand['brand_title'];

}

?>
<div class="continer mt-3">
    <h2 class="text-center">
        Edit Products
    </h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" value="<?php echo $product_title; ?>"
                class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Description</label>
            <input type="text" id="product_description" name="product_description"
                value="<?php echo $product_description; ?>" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Keywords</label>
            <input type="text" id="product_keyword" name="product_keyword" value="<?php echo $product_keyword; ?>"
                class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_id; ?>">
                    <?php echo $category_name; ?>
                </option>
                <?php

                $select_category_all = "select * from `categories`";
                $result_cat_all = mysqli_query($con, $select_category_all);
                while ($row_cat_all = mysqli_fetch_assoc($result_cat_all)) {
                    $category_name_all = $row_cat_all['category_title'];
                    $category_id_all = $row_cat_all['category_id'];
                    echo "<option value='$category_id_all'>$category_name_all</option>";
                }

                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Brands</label>
            <select name="product_brand" class="form-select">
                <option value="<?php echo $brand_id; ?>"><?php echo $brand_name; ?></option>
                <?php

                $select_brand_all = "select * from `brands`";
                $result_brand_all = mysqli_query($con, $select_brand_all);
                while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                    $brand_name_all = $row_brand_all['brand_title'];
                    $brand_id_all = $row_cat_all['brand_id'];
                    echo "<option value='$brand_id_all'>$brand_name_all</option>";
                }

                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Image 1</label>
            <div class="d-flex">
                <input type="file" id="product_image" name="product_image1" class="form-control w-90 m-auto"
                    required="required">
                <img src="product_images/<?php echo $product_image1; ?>" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Image 2</label>
            <div class="d-flex">
                <input type="file" id="product_image" name="product_image2" class="form-control w-90 m-auto"
                    required="required">
                <img src="product_images/<?php echo $product_image2; ?>" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Image 3</label>
            <div class="d-flex">
                <input type="file" id="product_image" name="product_image3" class="form-control w-90 m-auto"
                    required="required">
                <img src="product_images/<?php echo $product_image3; ?>" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" value="<?php echo $product_price; ?>"
                class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product"
                class="bg-dark text-white border-0 p-2 my-3">
        </div>
    </form>
</div>


<!-- Edit Product Details -->
<?php

if (isset($_POST['edit_product'])) {
    $product_name = $_POST['product_title'];
    $product_desc = $_POST['product_description'];
    $product_key = $_POST['product_keyword'];
    $product_cat = $_POST['product_category'];
    $product_br = $_POST['product_brand'];
    $product_pr = $_POST['product_price'];

    $product_img1 = $_FILES['product_image1']['name'];
    $product_img2 = $_FILES['product_image2']['name'];
    $product_img3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    move_uploaded_file($temp_image1, "product_images/$product_img1");
    move_uploaded_file($temp_image1, "product_images/$product_img2");
    move_uploaded_file($temp_image1, "product_images/$product_img3");

    $update_product = "update `product` set product_title='$product_name', product_description='$product_desc', product_keyword='$product_key', category_id='$product_cat', brand_id='$product_br', product_image1='$product_img1', product_image2='$product_img2', product_image3='$product_img3', product_price='$product_pr', date=NOW() where product_id = $edit_id";
    $result_update = mysqli_query($con, $update_product);

    if ($result_update) {
        echo "<script>alert('Product Details Updated Successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}

?>