<h2 class="text-center">All Payments</h2>

<table class="table table-bordered mt-3 text-center">
    <thead class="bg-dark text-white">
        <?php

        $get_payment = "select * from `user_payments`";
        $result = mysqli_query($con, $get_payment);
        $row = mysqli_num_rows($result);


        if ($row == 0) {
            echo "<div class='w-25 m-auto'><h2 class='p-2 bg-dark text-danger w-30 text-center mt-3'>No Payment Yet... &#128530;</h2></div>";
        } else {
            ?>
            <tr>
                <th>Sr No</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mdoe</th>
                <th>Order Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-white">
            <?php
            $num = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $payment_id = $row['payment_id'];
                $amount = $row['amount'];
                $invoice_number = $row['invoice_number'];
                $payment_mode = $row['payment_mode'];
                $order_date = $row['date'];
                ?>
                <tr>
                    <td>
                        <?php echo $num; ?>
                    </td>
                    <td>
                        <?php echo $invoice_number; ?>
                    </td>
                    <td>&#8377;
                        <?php echo $amount; ?>
                    </td>
                    <td>
                        <?php echo $payment_mode; ?>
                    </td>
                    <td>
                        <?php echo $order_date; ?>
                    </td>
                    <td><a href='index.php?delete_payment=<?php echo $payment_id; ?>' class='text-white'
                            onclick="return confirm('Are You Sure?')"><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
                $num++;
            }
        }
        ?>
    </tbody>
</table>