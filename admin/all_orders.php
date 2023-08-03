<h2 class="text-center">All Orders</h2>

<table class="table table-bordered mt-3 text-center">
    <thead class="bg-dark text-white">
        <?php

        $get_orders = "select * from `user_orders`";
        $result = mysqli_query($con, $get_orders);
        $row = mysqli_num_rows($result);


        if ($row == 0) {
            echo "<div class='w-25 m-auto'><h2 class='p-2 bg-dark text-danger w-30 text-center mt-3'>No Orders Yet... &#128530;</h2></div>";
        } else {
            ?>
            <tr>
                <th>Sr No</th>
                <th>Amount</th>
                <th>Invoice Number</th>
                <th>Total Product</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-white">
            <?php
            $num = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['order_id'];
                $amount = $row['amount_due'];
                $invoice_number = $row['invoice_number'];
                $total_products = $row['total_products'];
                $order_date = $row['order_date'];
                $order_status = $row['order_status'];
                ?>
                <tr>
                    <td>
                        <?php echo $num; ?>
                    </td>
                    <td>&#8377;
                        <?php echo $amount; ?>
                    </td>
                    <td>
                        <?php echo $invoice_number; ?>
                    </td>
                    <td>
                        <?php echo $total_products; ?>
                    </td>
                    <td>
                        <?php echo $order_date; ?>
                    </td>
                    <td>
                        <?php echo $order_status; ?>
                    </td>
                    <td><a href='index.php?delete_order=<?php echo $order_id; ?>' class='text-white'
                            onclick="return confirm('Are You Sure?')"><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
                $num++;
            }
        }
        ?>
    </tbody>
</table>