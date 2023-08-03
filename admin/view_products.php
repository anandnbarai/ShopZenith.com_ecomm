<h2 class="text-center">All Products</h2>
<table class="table table-bordered mt-3 text-center">
    <thead class="bg-dark text-white align-items-center">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-white">
        <?php

        $get_products = "select * from `product`";
        $result = mysqli_query($con, $get_products);
        $num = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image = $row['product_image1'];
            $product_price = $row['product_price'];
            $status = $row['status'];
            ?>
            <tr class='text-center'>
                <td>
                    <?php echo $num; ?>
                </td>
                <td>
                    <?php echo $product_title; ?>
                </td>
                <td><img src='product_images/<?php echo $product_image; ?>' class='product_image'></td>
                <td>&#8377;
                    <?php echo $product_price; ?>
                </td>
                <td>
                    <?php echo $status; ?>
                </td>
                <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-white'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_products=<?php echo $product_id; ?>' class='text-white' onclick="return confirm('Are You Sure?')"><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            $num++;
        }
        ?>
    </tbody>
</table>