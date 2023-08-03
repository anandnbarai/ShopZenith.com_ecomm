<h2 class="text-center">All Categorys</h2>
<table class="table table-bordered mt-3 text-center">
    <thead class="bg-dark text-white">
        <tr>
            <th>Sr No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-white">
        <?php

        $get_cat = "select * from `categories`";
        $result = mysqli_query($con, $get_cat);
        $num = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            ?>
            <tr>
                <td>
                    <?php echo $num; ?>
                </td>
                <td>
                    <?php echo $category_title; ?>
                </td>
                <td><a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-white'><i
                            class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_category=<?php echo $category_id; ?>' class='text-white'
                        onclick="return confirm('Are You Sure?')"><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            $num++;
        }
        ?>
    </tbody>
</table>