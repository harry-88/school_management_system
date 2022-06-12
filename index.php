<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo/logo.png" type="image/gif" sizes="16x16">


    <!-- Bootstrap -->
    <script src="https://kit.fontawesome.com/248b31097f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- External CSS -->
    <link rel="stylesheet" href="css/login.css">

    <!-- Page Title -->
    <title>ePortal System</title>

    <?php

    include 'php/links.php';
    include 'php/connection.php';

    

    // set display property none for alert on wrong credential
    $alertMsg = "d-none";

    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email == "admin" && $password == "admin") {

            $_SESSION['currentUserId'] = -1;
            header("Location: php/admin_dashboard.php");
        } else {

            // $hashCode = password_hash($passwrod, PASSWORD_BCRYPT);

            $query = "SELECT teacher_id,password,account_status from teachers where email = '$email'";
            $result = mysqli_query($connection, $query);
            
            $userInfo = mysqli_fetch_array($result);
            if ($userInfo != null) {


                $verify = password_verify($password, $userInfo['password']);

                if ($verify && $userInfo['account_status']) {
                    $_SESSION['currentUserId'] = $userInfo['teacher_id'];
                    header("Location: php/teacher_dashboard.php");
                } else {
                    // set display property for alert on wrong credential
                    $alertMsg = "d-block";
                }
            } else {

                $query = "SELECT student_id, password, account_status from Students where email = '$email'";
                $result = mysqli_query($connection, $query);
                $rows = mysqli_num_rows($result);
                

                if ($rows) {
                    $userInfo = mysqli_fetch_array($result);
                    $verify = password_verify($password, $userInfo['password']);

                    if ($verify && $userInfo['account_status']) {

                        $_SESSION['currentUserId'] = $userInfo['student_id'];
                        header("Location: php/student_dashboard.php");
                    } else {
                        // set display property for alert on wrong credential
                        $alertMsg = "d-block";
                    }
                } else {
                    // set display property for alert on wrong credential
                    $alertMsg = "d-block";
                }
            }
        }
    }

    ?>
    <script src="js/loginValidation.js"></script>

</head>

<body>
    <div class="container-fluid bg-light">

        <div id="logo-container" class="row d-flex justify-content-center p-3">
            <img src="assets/logo/logo.png" id="login-logo" alt="" width="250" height="210">
        </div>
        <div id="form-container" class="col-lg-6 col-md-10 col-12 p-lg-3 p-md-4 p-2 mx-auto">
            <h2 class="text-center mb-5">Welcome to School</h2>
            <div class="alert alert-danger <?php echo $alertMsg; ?>" role="alert">
                <strong>Invalid Username or Password!</strong>
            </div>

            <!-- Form -->
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="login-form" id="form">

                <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <input type="text" name="email" required id="email" class="form-control">
                    <span class="text-danger" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Password</label>
                    <input type="password" name="password" required id="password" class="form-control"><i class="fas fa-eye-slash" id="eye-icon" onclick="hideshow()"></i>
                    <span class="text-danger" id="passwordError"></span>
                    <a href="#" class="text-danger float-right font-weight-bold">Forgot password?</a>
                </div>

                <button type="submit" name="submit" class="btn btn-primary w-100 mt-5 mb-2">Login</button>

            </form>

        </div>

    </div>

    <script>
        // Function to Show/Hide Password
        var show = false;

        function hideshow() {

            if (show == false) {
                document.getElementById('eye-icon').classList.replace("fa-eye-slash", "fa-eye");
                document.getElementById('password').type = "text";
                show = true;
            } else {
                document.getElementById('eye-icon').classList.replace("fa-eye", "fa-eye-slash");
                document.getElementById('password').type = "password";
                show = false;
            }

        }
    </script>

</body>

</html>