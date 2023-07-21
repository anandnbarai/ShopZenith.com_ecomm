<?php

if (isset($_GET['change_password'])) {
    $username = $_SESSION['username'];
    $select_query = "select * from `user_table` where username = '$username'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);


    if (isset($_POST['change'])) {

        $userpassword = $_POST['user_password'];
        $newpassword = $_POST['new_password'];
        $confirmpassword = $_POST['confirm_password'];

        if (password_verify($userpassword, $row_fetch['user_password'])) {
            $hash_password = password_hash($newpassword, PASSWORD_DEFAULT);

            if ($newpassword = $confirmpassword) {
                $update_pass = "update `user_table` set user_password='$hash_password' where username = '$username'";
                $result_update = mysqli_query($con, $update_pass);

                if ($result_update) {
                    echo "<Script>alert('Your password changed successfully')</Script>";
                    echo "<script>window.open('logout.php','_self')</script>";
                }
            }
        }
    }
}

?>
<h2 class="mb-3">Change Password</h2>
<div class="container mt-3">
    <form action="" method="post">
        <div class="form-outline mb-4">
            <input type="password" class="form-control w-50 m-auto" name="user_password"
                placeholder="Enter Your Old Password">
        </div>

        <div class="form-outline mb-4">
            <input type="password" class="form-control w-50 m-auto" name="new_password"
                placeholder="Enter Your New Password">
        </div>

        <div class="form-outline mb-4">
            <input type="password" class="form-control w-50 m-auto" name="confirm_password"
                placeholder="Confirm Your New Password">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="btn btn-dark" value="Change Password" name="change" />
        </div>
    </form>
</div>