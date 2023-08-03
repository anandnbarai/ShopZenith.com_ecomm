<?php

include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | ShopZenith - Unleash your shopping potential</title>

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
        .admin_image {
            width: 500px;
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link text-white">Welcome Admin!</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <h2 class="text-center mt-5">Admin Login</h2>

        <div class="row d-flex align-items-center justify-content-center mt-2">
            <div class="col-lg-6 col-xl-5">
                <img src="../img/6300830.jpg" alt="Register Image" class="admin_image">
            </div>
            <div class="col-lg-6 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-outline mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control"
                            placeholder="Enter Your Username" autocomplete="off" required="required" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter Your Password" autocomplete="off" required="required" />
                    </div>

                    <div>
                        <input type="submit" class="btn btn-dark mb-2" value="Login" name="login" />
                        <p class="small fw-bold">Don't have an Account? <a href="admin_register.php"
                                class="text-danger">Register Here!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_query = "select * from `admin` where name = '$username'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($rows_count > 0) {
        $_SESSION['username'] = $username;

        if (password_verify($password, $row_data['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['admin_id'] = $admin_id;

            echo "<script>alert('You have successfully logged in')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials.')</script>";
    }
}

include('../includes/footer.php');

?>