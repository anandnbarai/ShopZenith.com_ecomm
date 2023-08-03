<h2 class="text-center">All Users</h2>

<table class="table table-bordered mt-3 text-center">
    <thead class="bg-dark text-white">
        <?php

        $get_user = "select * from `user_table`";
        $result = mysqli_query($con, $get_user);
        $row = mysqli_num_rows($result);


        if ($row == 0) {
            echo "<div class='w-25 m-auto'><h2 class='p-2 bg-dark text-danger w-30 text-center mt-3'>No User Registered Yet... &#128530;</h2></div>";
        } else {
            ?>
            <tr>
                <th>Sr No</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Image</th>
                <th>User Address</th>
                <th>User Mobile</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-white">
            <?php
            $num = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_address = $row['user_address'];
                $user_mobile = $row['user_mobile'];
                ?>
                <tr>
                    <td>
                        <?php echo $num; ?>
                    </td>
                    <td>
                        <?php echo $username; ?>
                    </td>
                    <td>
                        <?php echo $user_email; ?>
                    </td>
                    <td>
                    <img src='../user/user_images/<?php echo $user_image; ?>' class='user_image' alt='User Image'>
                    </td>
                    <td>
                        <?php echo $user_address; ?>
                    </td>
                    <td>
                        <?php echo $user_mobile; ?>
                    </td>
                    <td><a href='index.php?delete_user=<?php echo $user_id; ?>' class='text-white'
                            onclick="return confirm('Are You Sure?')"><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
                $num++;
            }
        }
        ?>
    </tbody>
</table>