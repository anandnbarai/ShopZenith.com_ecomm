<h2 class="mb-4 text-dark">Delete Account</h2>
<h5 class="mb-3 text-dark"> Give us one more chance to Serve you by not deleting your account <br>
    <a href='../index.php' class='text-dark'>Explore Products</a><br><br>If you are no longer interested in using our
    service, you can delete your account.<br>Once you delete your account, you will not be able to recover your data.
</h5>

<h5 class='mb-5'>

</h5>
<form action="" method="post">
    <div class="form-outline mb-3 m-auto w-50">
        <input type="submit" onclick="return confirm('Are You Sure?')" class="form-control bg-danger text-white" name="delete" value="Delete Account">
    </div>
</form>

<?php

$username = $_SESSION['username'];

if (isset($_POST['delete'])) {
    $delete = "delete from `user_table` where username = '$username'";
    $result = mysqli_query($con, $delete);

    if ($result) {
        session_destroy();
        echo "<script>alert('Your Account deleted Successfully. See You Again!!!')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

?>