<?php
session_start();

if (!isset($_SESSION['currentUserId'])) {

?><script>
        alert("You are logged out. Please login again");
        location.replace("../index.php");
    </script><?php
            }


                ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Info</title>

    <?php include 'links.php'; ?>
    <script src="../js/sidebar_showhide.js"></script>
    <script src="../js/logout_dropdown.js"></script>
</head>

<body>

    <!-- Php Code -->
    <?php

    include 'DBManager.php';

    $teacherID = $_SESSION['currentUserId'];

    $query = "SELECT * from Teachers WHERE teacher_id = $teacherID";
    $result = mysqli_query($connection, $query);
    $teacherInfo = mysqli_fetch_array($result);

    ?>



    <!-- Wrapper Start -->
    <div class="wrapper">

        <!-- Sidebar Start -->
        <nav id="sidebar">

            <!-- User -->
            <a href="#" id="logo-container">
                <img class="mt-3 ml-4" src="../assets/logo/logo1.png" alt="Logo" width="180">
            </a>
            <hr class="my-3 sidebar-separator" style="background-color: rgba(255, 255, 255, 0.562);">

            <!-- Navigation -->
            <ul>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="teacher_dashboard.php">
                        <i class="fas fa-tachometer-alt ml-1 mr-2"></i>
                        Dashboard
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3 active">
                        <i class="fas fa-chalkboard-teacher ml-1 mr-2"></i>
                        Personal Info
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="class_students.php">
                        <i class="fas fa-user-graduate ml-1 mr-2"></i>
                        Students
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="parents_info.php">
                        <i class="fa fa-group ml-1 mr-2"></i>
                        Parents
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="#">
                        <i class="fas fa-book ml-1 mr-2"></i>
                        Subjects
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="student_assessments.php">
                        <i class="fas fa-award ml-1 mr-2"></i>
                        Assessments
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="#">
                        <i class="fa fa-chart-bar ml-1 mr-2"></i>
                        Results
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div id="content" class="overflow-auto">

            <!-- Top Navbar -->
            <nav class="navbar mb-2 navbar-light bg-light mb-2">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" id="sidebar-toggle" onclick="hideSidebar()" class="btn btn-info navbar-btn mr-auto">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>
                    <!-- <span class="ml-auto mr-2 font-weight-bold" style="font-size: 20px;">Jawad Shah</span> -->
                    <a class="text-decoration-none">
                        <img src="../assets/user-profile.jpg" id="user-profile" onclick="showDropdown()" width="40" height="40" class="rounded-circle ml-auto" alt="">
                        <div class="card p-2 bg-white shadow" id="dropdown">
                            <div class="useinfo p-2 mb-2 d-flex">
                                <div>
                                    <img src="../assets/user-icon.png" class="rounded-circle mr-3" width="50" height="50">
                                </div>
                                <div>
                                    <div class="text-primary font-weight-bold" id="username" style="font-size: 18px;">
                                        <?php echo $teacherInfo['first_name'] . " " . $teacherInfo['last_name']; ?> </div>
                                    <div class="text-muted font-weight-bold" id="user-id" style="font-size: 14px;">
                                        Teacher</div>
                                </div>
                            </div>
                            <a href="#" onclick="changePassword()" class="nav-link text-dark font-weight-bold" data-target="#changePasswordWindow" data-toggle="modal"><i class="fa fa-key pr-2"></i>
                                Change Password</a>

                            <hr class="my-1 color-light">
                            <a href="logout.php" class="nav-link text-dark font-weight-bold"><i class="fas fa-sign-out-alt pr-3"></i>Log
                                Out</a>
                        </div>
                    </a>
                </div>
            </nav>


            <div class="card mb-2 p-4">
                <h2><b>Teacher Info</b></h2>
            </div>

            <div class="card bg-white mb-2 p-4 rounded-0" id="content-wrapper">

                <div class="card bg-white p-5 mb-3">
                    <div class="row">
                        <div class="col-4">
                            <img src="../assets/teacher1.jpg" alt="Profile" width="230" height="230">
                        </div>
                        <div class="col-8">
                            <div class="row mb-2 bg-light">
                                <div class="col-6">
                                    <label class="font-weight-bold text-black d-block">Name</label>
                                    <span class="text-muted"><?php echo $teacherInfo['first_name'] . " " . $teacherInfo['last_name']; ?></span>
                                </div>
                                <div class="col-6">
                                    <label class="font-weight-bold text-black d-block">Gender</label>
                                    <span class="text-muted"><?php echo $teacherInfo['gender']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2 bg-light">
                                <div class="col-6">
                                    <label class="font-weight-bold text-black d-block">Contact</label>
                                    <span class="text-muted"><?php echo $teacherInfo['mobile_number']; ?></span>
                                </div>
                                <div class="col-6">
                                    <label class="font-weight-bold text-black d-block">Email</label>
                                    <span class="text-muted"><?php echo $teacherInfo['email']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2 bg-light">
                                <div class="col-6">
                                    <label class="font-weight-bold text-black d-block">CNIC</label>
                                    <span class="text-muted"><?php echo $teacherInfo['cnic']; ?></span>
                                </div>
                                <div class="col-6">
                                    <label class="font-weight-bold text-black d-block">Address</label>
                                    <span class="text-muted"><?php echo $teacherInfo['address']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2 bg-light">
                                <div class="col-6">
                                    <label class="font-weight-bold text-black d-block">Qualification</label>
                                    <span class="text-muted"><?php echo $teacherInfo['qualification']; ?></span>
                                </div>
                                <div class="col-6">
                                    <label class="font-weight-bold text-black d-block">Subject</label>
                                    <span class="text-muted"><?php echo $teacherInfo['subject']; ?></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="card p-4 bg-white" id="footer">
                Developed by : <b>Muhammad Haris </b>
            </div>



        </div>
        <!-- Content End -->


    </div>

    <div class="modal" id="changePasswordWindow">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="text-primary font-weight-bold">Change Password</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="oldPassword">Old Password</label>
                            <input class="form-control" required type="password" name="oldPassword" id="oldPassword">
                            <span class="text-danger font-weight-bold" id="oldPasswordError"></span>
                        </div>

                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input class="form-control" required type="password" name="newPassword" id="newPassword">
                            <span class="text-danger font-weight-bold" id="newPasswordError"></span>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input class="form-control" required type="password" name="confirmPassword" id="confirmPassword">
                            <span class="text-danger font-weight-bold" id="confirmPasswordError"></span>
                        </div>

                        <button type="button" class="btn btn-success w-100 mt-3" name="submit" data-dismiss="modal">Save Changes</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Wrapper End     -->


</body>

</html>