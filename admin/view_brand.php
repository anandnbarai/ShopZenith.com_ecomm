<h2 class="text-center">All Brands</h2>
<table class="table table-bordered mt-3 text-center">
    <thead class="bg-dark text-white">
        <tr>
            <th>Sr No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-white">
        <?php

        $get_brand = "select * from `brands`";
        $result = mysqli_query($con, $get_brand);
        $num = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            ?>
            <tr>
                <td>
                    <?php echo $num; ?>
                </td>
                <td>
                    <?php echo $brand_title; ?>
                </td>
                <td><a href='index.php?edit_brand=<?php echo $brand_id; ?>' class='text-white'><i
                            class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_brand=<?php echo $brand_id; ?>' class='text-white'
                        onclick="return confirm('Are You Sure?')"><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            $num++;
        }
        ?>
    </tbody>
</table>