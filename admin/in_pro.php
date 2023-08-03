<?php

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = true;

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //checking empty condition

    if ($product_title == '' or $description == '' or $product_keywords == '' or $product_category == '' or $product_brands == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '') {
        echo "<script>alert('Please fill all the data.')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        $insert_products = "insert into `product` (product_title,product_description,product_keyword,category_id,brand_id,	product_image1,	product_image2,	product_image3,	product_price,date,status) values ('$product_title','$description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

        $result_query = mysqli_query($con, $insert_products);

        if ($result_query) {
            echo "<script>alert('Product inserted succefully')</script>";
        }
    }
}
?>

<div class="container">
    <h2 class="text-center mt-3">Insert Products</h2>
</div>
<!-- form -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form-label">Prodcut Title</label>
        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Name"
            autocomplete="off" required>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="description" class="form-label">Prodcut Description</label>
        <input type="text" name="description" id="description" class="form-control"
            placeholder="Enter Product Description" autocomplete="off" required>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_keywords" class="form-label">Prodcut Keywords</label>
        <input type="text" name="product_keywords" id="product_keywords" class="form-control"
            placeholder="Enter Product Keywords" autocomplete="off" required>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_category" class="form-select">
            <option value="">
                Select Category
            </option>
            <?php

            $select_query = "select * from `categories`";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $category_title = $row['category_title'];
                $category_id = $row['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_brands" class="form-select">
            <option value="">
                Select Brands
            </option>
            <?php

            $select_query = "select * from `brands`";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $brand_title = $row['brand_title'];
                $brand_id = $row['brand_id'];
                echo "<option value='$brand_id'>$brand_title</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label">Prodcut Image 1</label>
        <input type="file" name="product_image1" id="product_keywords" class="form-control" required>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label">Prodcut Image 2</label>
        <input type="file" name="product_image2" id="product_keywords" class="form-control" required>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label">Prodcut Image 3</label>
        <input type="file" name="product_image3" id="product_keywords" class="form-control" required>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_price" class="form-label">Prodcut Price</label>
        <input type="text" name="product_price" id="product_price" class="form-control"
            placeholder="Enter Product Price" autocomplete="off" required>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_product" class="bg-dark text-white border-0 p-2" value="Insert Product">
    </div>
</form>
