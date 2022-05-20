<?php
session_start();

if(!isset($_SESSION['currentUserId'])){

    ?><script>
        alert("You are logged out. Please login again");
        location.replace("../index.php");
    </script><?php   
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teacher Info</title>

    <?php include 'links.php'; ?>
    <script src="../js/sidebar_showhide.js"></script>
    <script src="../js/logout_dropdown.js"></script>

</head>

<body>
    
    <!-- Php Code -->
    <?php 
        include 'DBManager.php';

        $teacherID = $_GET['id'];

        $query = "SELECT * from Teachers WHERE teacher_id = '$teacherID'";
        $result = mysqli_query($connection,$query);
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
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="admin_dashboard.php">
                        <i class="fas fa-tachometer-alt ml-1 mr-2"></i>
                        Dashboard
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3 active">
                        <i class="fas fa-chalkboard-teacher ml-1 mr-2"></i>
                        Teachers
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="manage_students.php">
                        <i class="fas fa-user-graduate ml-1 mr-2"></i>
                        Students
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="manage_parents.php">
                        <i class="fa fa-group ml-1 mr-2"></i>
                        Parents
                    </a>
                </li>
                <li><a data-toggle="modal" data-target="#exampleModalCenter" class="nav-link text-white font-weight-bold px-3 py-3" href="#"  >
                        <i class="fas fa-book ml-1 mr-2"></i>
                        Subjects
                    </a>
                </li>
                <li><a data-toggle="modal" data-target="#exampleModalCenter" class="nav-link text-white font-weight-bold px-3 py-3" href="#"  >
                        <i class="fas fa-award ml-1 mr-2"></i>
                        Assessments
                    </a>
                </li>
                <li><a data-toggle="modal" data-target="#exampleModalCenter" class="nav-link text-white font-weight-bold px-3 py-3" href="#"  >
                        <i class="fa fa-chart-bar ml-1 mr-2"></i>
                        Results
                    </a>
                </li>
                <li><a data-toggle="modal" data-target="#exampleModalCenter" class="nav-link text-white font-weight-bold px-3 py-3" href="#"  >
                        <i class="fa fa-money-check-alt ml-1 mr-2"></i>
                        Payments
                    </a>
                </li>
                <li><a data-toggle="modal" data-target="#exampleModalCenter" class="nav-link text-white font-weight-bold px-3 py-3" href="#"  >
                        <i class="fas fa-users ml-1 mr-2"></i>
                        Admins
                    </a>
                </li>
                <li><a data-toggle="modal" data-target="#exampleModalCenter" class="nav-link text-white font-weight-bold px-3 py-3" href="#"  >
                        <i class="fas fa-copy ml-1 mr-2"></i>
                        Accounts
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Sidebar End -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Working</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        We are working on it.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
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
                                    <div class="text-primary font-weight-bold" id="username" style="font-size: 18px;">Muhammad Haris
                                    </div>
                                    <div class="text-dark font-weight-bold" id="user-id" style="font-size: 14px;">Admin</div>
                                </div>
                            </div>
                            <a href="#" class="nav-link text-dark font-weight-bold"><i class="fa fa-key pr-2"></i> Change
                                Password</a>
                            <hr class="my-1 color-light">
                            <a href="logout.php" class="nav-link text-dark font-weight-bold"><i
                                    class="fas fa-sign-out-alt pr-3"></i>Log
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
                            <img src="../assets/user-icon.png" alt="Profile" width="200" height="200">
                        </div>
                        <div class="col-8">
                            <div class="row mb-2 bg-light">
                                <div class="col-6">
                                    <label class="font-weight-bold text-black d-block">Name</label>
                                    <span class="text-muted"><?php echo $teacherInfo['first_name']." ".$teacherInfo['last_name']; ?></span>
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
                Developed by : <b>Muhammad haris</b>
            </div>



        </div>
        <!-- Content End -->


    </div>
    <!-- Wrapper End     -->


</body>

</html>