<?php

if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
}

?>
<div class="continer mt-3">
    <h2 class="text-center">
        Edit Products
    </h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Description</label>
            <input type="text" id="product_description" name="product_description" class="form-control"
                required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Keywords</label>
            <input type="text" id="product_keyword" name="product_keyword" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select">
                <option value="">1</option>
                <option value="">2</option>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Brands</label>
            <select name="product_category" class="form-select">
                <option value="">1</option>
                <option value="">2</option>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Image 1</label>
            <div class="d-flex">
                <input type="file" id="product_image" name="product_image1" class="form-control w-90 m-auto"
                    required="required">
                <img src="../img/MQ023HN_A.webp" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Image 2</label>
            <div class="d-flex">
                <input type="file" id="product_image" name="product_image2" class="form-control w-90 m-auto"
                    required="required">
                <img src="../img/MQ023HN_A.webp" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Image 3</label>
            <div class="d-flex">
                <input type="file" id="product_image" name="product_image3" class="form-control w-90 m-auto"
                    required="required">
                <img src="../img/MQ023HN_A.webp" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product"
                class="bg-dark text-white border-0 p-2 my-3">
        </div>
    </form>
</div>