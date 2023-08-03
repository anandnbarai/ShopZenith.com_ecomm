<?php

include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registeration | ShopZenith - Unleash your shopping potential</title>
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
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .reg_image {
            width: 600px;
            object-fit: contain;
        }

        .logo {
            width: 3%;
            height: 2%;
        }
    </style>
</head>

<body style="overflow-x:hidden">

    <nav class="navbar navbar-expand-lg navbar-dark text-white bg-dark">
        <div class="container-fluid">
            <img src="../img/Yellow E-commerce Shop Bag Store Logo.png" class="logo">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="admin_login.php">Login</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link text-white">Welcome Admin!</a>
                </li>
            </ul>
        </div>
    </nav>
    <h2 class="text-center mt-3">New Admin Registration</h2>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../img/Wavy_Tech-28_Single-10.jpg" alt="Register Image" class="reg_image">
        </div>
        <div class="col-lg-6 col-xl-5 mt-3">
            <form action="" method="post" enctype="multipart/form-data">


                <div class="form-outline mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control"
                        placeholder="Enter Your Username" autocomplete="off" required="required" />
                </div>

                <div class="form-outline mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email"
                        autocomplete="off" required="required" />
                </div>

                <!-- <div class="form-outline mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control" placeholder="Upload Your Image"
                        required="required" />
                </div> -->

                <div class="form-outline mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Enter Your Password" autocomplete="off" minlength="6" required="required" />
                </div>

                <div class="form-outline mb-3">
                    <label for="conf_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_password" name="conf_password" class="form-control"
                        placeholder="Confirm Your Password" autocomplete="off" minlength="6" required="required" />
                </div>

                <div>
                    <input type="submit" class="bg-dark py-2 px-2 mb-3 text-white border-0" value="Register"
                        name="register" />
                    <p class="small fw-bold">Already have an Account? <a href="admin_login.php" class="text-danger">
                            Login Here!</a></p>
                </div>

            </form>
        </div>
    </div>

</html>

<?php

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $conf_password = $_POST['conf_password'];

    if ($password != $conf_password) {
        echo "<script class='text-danger'>alert('Your Password does not match')</script>";
    } else {
        $insert_query = "insert into `admin` (name, email, password) values ('$username','$email','$hash_password')";
        $sql_exe = mysqli_query($con, $insert_query);

        if ($sql_exe) {
            echo "<script>alert('Your Account has been created.')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}

include('../includes/footer.php');

?>