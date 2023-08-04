<?php

include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Regiteration | ShopZenith - Unleash your shopping potential</title>

    <link rel="icon" type="image/x-icon" href="../img/Yellow E-commerce Shop Bag Store Logo.png">
    <!-- Boostrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boostrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <style>
        textarea {
            resize: none;
        }

        .logo {
            width: 3%;
            height: 2%;
        }

        .reg_image {
            width: 600px;
            object-fit: contain;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark text-white bg-dark">
        <div class="container-fluid">
            <img src="../img/Yellow E-commerce Shop Bag Store Logo.png" class="logo">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="../index.php">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link text-white">Welcome User!</a>
                </li>
            </ul>
        </div>
    </nav>

  
    <div class="container-fluid">
        <h2 class="text-center my-3">New User Registration</h2>

        <div class="row d-flex align-items-center justify-content-center mt-4">
            <div class="col-lg-6 col-xl-5">
                <img src="../img/Wavy_Tech-28_Single-10.jpg" alt="Register Image" class="reg_image">
            </div>
            <div class="col-lg-6 col-xl-5 mt-5">
                <form action="" method="post" enctype="multipart/form-data">


                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" name="user_username" class="form-control"
                            placeholder="Enter Your Username" autocomplete="off" required="required" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" name="user_email" class="form-control"
                            placeholder="Enter Your Email" autocomplete="off" required="required" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="user_contact" class="form-label">Mobile Number</label>
                        <input type="text" id="user_contact" name="user_contact" class="form-control"
                            placeholder="Enter Your Number" autocomplete="off" minlength="10" required="required" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" name="user_image" class="form-control"
                            placeholder="Upload Your Image" required="required" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control"
                            placeholder="Enter Your Password" autocomplete="off" minlength="6" required="required" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" name="conf_user_password" class="form-control"
                            placeholder="Confirm Your Password" autocomplete="off" minlength="6" required="required" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="user_address" class="form-label">Address</label>
                        <textarea id="user_address" name="user_address" class="form-control" autocomplete="off" rows="4"
                            required="required">
                        </textarea>
                    </div>

                    <div>
                        <input type="submit" class="bg-dark py-2 px-2 mb-3 text-white border-0" value="Register"
                            name="user_register" />
                        <p class="small fw-bold">Already have an Account? <a href="user_login.php"
                                class="text-danger">Login Here!</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php

if (isset($_POST['user_register'])) {

    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_contact = $_POST['user_contact'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // select query

    $select_query = "select * from `user_table` where username='$user_username'";
    $select_query1 = "select * from `user_table` where user_email='$user_email'";
    $select_query2 = "select * from `user_table` where user_mobile='$user_contact'";

    $result = mysqli_query($con, $select_query);
    $result1 = mysqli_query($con, $select_query1);
    $result2 = mysqli_query($con, $select_query2);

    $rows_count = mysqli_num_rows($result);
    $rows_count1 = mysqli_num_rows($result1);
    $rows_count2 = mysqli_num_rows($result2);

    if ($rows_count > 0) {
        echo "<script class='text-danger'>alert('Username aleady exist')</script>";
    } elseif ($rows_count1) {
        echo "<script class='text-danger'>alert('Email already exist')</script>";
    } elseif ($rows_count2) {
        echo "<script class='text-danger'>alert('Mobile Number already exist')</script>";
    } elseif ($user_password != $conf_user_password) {
        echo "<script class='text-danger'>alert('Your Password does not match')</script>";
    } else {
        // Insert query
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "insert into `user_table` (username, user_email, user_password, user_image, user_ip,user_address, user_mobile) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_exe = mysqli_query($con, $insert_query);
        if ($sql_exe) {
            echo "<script>alert('Your Account has been created.')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";
        } else {
            die(mysqli_error($con));
        }
    }

    // selecting cart items

    $select_cart = "select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart);
    $rows_count = mysqli_num_rows($result_cart);

    if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }


}

include("../includes/footer.php");

?>