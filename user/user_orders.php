<?php

$username = $_SESSION['username'];
$get_user = "select * from `user_table` where username = '$username'";
$result_query = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result_query);
$user_id = $row_fetch['user_id'];

?>
<h2 class="text-success">Order History</h2>

<table class="table table-bordered mt-3 text-center">
    <thead class="bg-dark text-white">
        <tr>
            <th>Sr No</th>
            <th>Amount Due</th>
            <th>Total Products</th>
            <th>Inovice Number</th>
            <th>Order Date</th>
            <th>Order Status</th>
            <th>Payment Status</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-white">
        <?php

        $get_order_details = "select * from `user_orders` where user_id = $user_id";
        $result_orders = mysqli_query($con, $get_order_details);
        $num = 1;
        while ($row_orders = mysqli_fetch_assoc($result_orders)) {
            $oid = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $total_products = $row_orders['total_products'];
            $invoice_number = $row_orders['invoice_number'];
            $order_status = $row_orders['order_status'];

            if($order_status=='pending'){
                $order_status='Incomplete';
            }else{
                $order_status = 'Complete';
            }
            $order_date = $row_orders['order_date'];
            echo "<tr>
                <td> $num </td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='confirm_payment.php' class='text-white'>Confirm</a></td>
                </tr>";
            $num++;
        }
        ?>
    </tbody>
</table>