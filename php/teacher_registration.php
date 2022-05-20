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

    <title>Teacher Registration</title>

    <?php include 'links.php' ?>
    <script src="../js/teacher_registration_validation.js"></script>
    <script src="../js/sidebar_showhide.js"></script>
    <script src="../js/logout_dropdown.js"></script>

</head>

<body>


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
                <li><a class="nav-link text-white font-weight-bold px-3 py-3 active" href="manage_teachers.php">
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

            <div class="card bg-white mb-2 p-4 rounded-0" id="content-wrapper">
                <h2 class="main-heading text-secondary"><b>Teacher Registration Form</b></h2>
                <hr class="divider py-2">

                <!-- Form Start -->
                <form action="add_teacher.php" method="POST" onsubmit="return validation()">

                    <div class="px-5 py-3 mb-5 border" id="personal-info">

                        <h5 class="text-primary mb-3"><b>Personal Information</b></h5>

                        <div class="clearfix name-container">
                            <div class="form-group float-left">
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" required id="firstName"
                                    class="form-control mr-5">
                                <span class="text-danger font-weight-bold" id="firstNameError"></span>
                            </div>
                            <div class="form-group float-right">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" required id="lastName"
                                    class="form-control">
                                <span class="text-danger font-weight-bold" id="lastNameError"></span>
                            </div>
                        </div>

                        <div class="clearfix class-container">
                            <div class="form-group float-left">
                                <label for="class">Class</label>
                                <select class="form-control" name="class" id="class" required>
                                    <option value="">--Select Your Class--</option>
                                    <option value="Nursery">Nursery</option>
                                    <option value="Prep">Prep</option>
                                    <option value="One">One</option>
                                    <option value="Two">Two</option>
                                    <option value="Three">Three</option>
                                    <option value="Four">Four</option>
                                    <option value="Five">Five</option>
                                    <option value="Six">Six</option>
                                    <option value="Seven">Seven</option>
                                    <option value="Eight">Eight</option>
                                    <option value="Nine">Nine</option>
                                    <option value="Ten">Ten</option>
                                </select>
                                <span class="text-danger font-weight-bold" id="classError"></span>
                            </div>
                            <div class="form-group float-right">
                                <label for="section">Section</label>
                                <select class="form-control" name="section" id="section" required>
                                    <option value="">--Select Class--</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                                <span class="text-danger font-weight-bold" id="sectionError"></span>
                            </div>
                        </div>

                        <div class="form-group my-2">
                            <label for="gender" class="mr-5">Gender</label>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="maleOption" value="Male">
                                <label class="form-check-label font-weight-normal" for="maleOption">
                                    Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="femaleOption" value="Female">
                                <label class="form-check-label font-weight-normal" for="femaleOption">
                                    Female
                                </label>
                            </div>
                            <span id="genderError"></span>
                        </div>

                        <div class="form-group">
                            <label for="mobileNumber">Mobile Number</label>
                            <input class="form-control" required type="text" name="mobileNumber"
                                id="mobileNumber" placeholder="e.g. 03XX-XXXXXXX">
                            <span class="text-danger font-weight-bold" id="mobileNumberError"></span>
                        </div>

                        <div class="form-group">
                            <label for="cnic">CNIC (National Identity Card)</label>
                            <input class="form-control" required type="text" name="cnic" id="cnic"
                                placeholder="e.g. XXXXXXXXXXXXX">
                            <span class="text-danger font-weight-bold" id="cnicError"></span>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" required name="address" id="address"
                                rows="3"></textarea>
                        </div>

                    </div>

                    <div class="px-5 py-3 mb-5 border" id="parent-info">

                        <h5 class="text-primary mb-3"><b>Academic Information</b></h5>

                        <div class="clearfix name-container">
                            <div class="form-group float-left">
                                <label for="qualification">Qualification</label>
                                <input type="text" name="qualification" required id="qualification"
                                    class="form-control mr-5">
                                <span class="text-danger font-weight-bold" id="qualificationError"></span>
                            </div>
                            <div class="form-group float-right">
                                <label for="Subject">Subject</label>
                                <input type="text" name="subject" required id="subject"
                                    class="form-control">
                                <span class="text-danger font-weight-bold" id="subjectError"></span>
                            </div>
                        </div>


                    </div>

                    <div class="px-5 py-3 mb-3 border" id="account-info">
                        <h5 class="text-primary mb-3"><b>Account Information</b></h5>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" required type="email" name="email" id="email"
                                placeholder="yourname@gmail.com">
                            <span class="text-danger font-weight-bold" id="emailError"></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" required type="password" name="password" id="password">
                            <span class="text-danger font-weight-bold" id="passwordError"></span>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input class="form-control" required type="password" name="confirmPassword"
                                id="confirmPassword">
                            <span class="text-danger font-weight-bold" id="confirmPasswordError"></span>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary w-100" name="submit">Register</button>

                </form>


            </div>

            <div class="card p-4 bg-white" id="footer">
                Developed by : <b>Muhammad Haris </b>
            </div>



        </div>
        <!-- Content End -->


    </div>
    <!-- Wrapper End     -->

</body>

</html>