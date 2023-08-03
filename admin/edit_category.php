<?php

if (isset($_GET['edit_category'])) {
    $edit_id = $_GET['edit_category'];
    $get_data = "select * from `categories` where category_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);

    $category_title = $row['category_title'];
}

?>
<div class="continer mt-3">
    <h2 class="text-center">
        Edit Category
    </h2>
    <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Category Title</label>
            <input type="text" id="category_title" name="category_title" value="<?php echo $category_title; ?>"
                class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_category" value="Update Category"
                class="bg-dark text-white border-0 p-2 my-3">
        </div>
    </form>
</div>
<?php

if (isset($_POST['edit_category'])) {
    $category_title = $_POST['category_title'];

    $update_cat = "update `categories` set category_title='$category_title' where category_id = $edit_id";
    $result_update = mysqli_query($con, $update_cat);

    if ($result_update) {
        echo "<script>alert('Category Updated Successfully')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>";
    }
}

?>