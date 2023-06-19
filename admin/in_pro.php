<?php

include("../includes/connect.php");

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
            echo "<script>alert('Succefully Inserted the Product')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Insert Product - Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boostrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">Insert Products</h1>
    </div>
    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Prodcut Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Enter Product Name" autocomplete="off" required>
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
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
        </div>
    </form>
</body>

</html>