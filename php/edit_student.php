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
    <title>Edit Student Info</title>

    <?php include 'links.php'; ?>
    <script src="../js/sidebar_showhide.js"></script>
    <script src="../js/logout_dropdown.js"></script>
    <script src="../js/student_registration.js"></script>


</head>

<body>

    <?php include 'connection.php'; ?>
    
    
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
                <li><a class="nav-link text-white font-weight-bold px-3 py-3" href="manage_teachers.php">
                        <i class="fas fa-chalkboard-teacher ml-1 mr-2"></i>
                        Teachers
                    </a>
                </li>
                <li><a class="nav-link text-white font-weight-bold px-3 py-3 active">
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

            <?php
                $selected_id = $_GET['id'];

                $query = "SELECT * FROM Students WHERE student_id = '$selected_id'";
                $result = mysqli_query($connection,$query);
                
                if(mysqli_num_rows($result)>0){
                    $student = mysqli_fetch_array($result);
                    $parent_id = $student['parent_id'];
            ?>

            <div class="card bg-white mb-2 p-4 rounded-0" id="content-wrapper">
                <h2 class="main-heading text-secondary"><b>Edit Student Info</b></h2>
                <hr class="divider py-2">

                <!-- Form Start -->
                <form action="update_student_info.php" method="POST" onsubmit="return validateStudentRegistration()" autocomplete="off">

                    <div class="px-5 py-3 mb-5 border" id="personal-info">

                        <h5 class="text-primary mb-3"><b>Personal Information</b></h5>

                        <div class="clearfix name-container">
                            <div class="form-group float-left">
                                <label for="firstName">First Name</label>
                                <input type="text" name="studentFirstName" required id="studentFirstName"
                                    class="form-control mr-5" value="<?php echo $student['first_name']; ?>">
                                <span class="text-danger font-weight-bold" id="studentFnameError"></span>
                            </div>
                            <div class="form-group float-right">
                                <label for="studentLastName">Last Name</label>
                                <input type="text" name="studentLastName" required id="studentLastName"
                                    class="form-control" value="<?php echo $student['last_name']; ?>">
                                <span class="text-danger font-weight-bold" id="studentLnameError"></span>
                            </div>
                        </div>
                        <?php
                            $className = $student['class_name'];
                            $query = "SELECT * from Classes WHERE class_name = '$className'";
                            $result = mysqli_query($connection,$query);
                            $classData = mysqli_fetch_array($result);
                        ?>

                        <div class="clearfix class-container">
                            <div class="form-group float-left">
                                <label for="">Class</label>
                                <select class="form-control" name="studentClass" id="studentClass" required disabled>
                                    <option value="">--Select Your Class--</option>
                                    <option value="Nursery"
                                    <?php
                                        if($student['class_name']=="Nursery"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Nursery</option>
                                    <option value="Prep"
                                    <?php
                                        if($student['class_name']=="Prep"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Prep</option>
                                    <option value="One"
                                    <?php
                                        if($student['class_name']=="One"){
                                            echo "selected";
                                        }
                                    ?>
                                    >One</option>
                                    <option value="Two"
                                    <?php
                                        if($student['class_name']=="Two"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Two</option>
                                    <option value="Three"
                                    <?php
                                        if($student['class_name']=="Three"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Three</option>
                                    <option value="Four"
                                    <?php
                                        if($student['class_name']=="Four"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Four</option>
                                    <option value="Five"
                                    <?php
                                        if($student['class_name']=="Five"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Five</option>
                                    <option value="Six"
                                    <?php
                                        if($student['class_name']=="Six"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Six</option>
                                    <option value="Seven"
                                    <?php
                                        if($student['class_name']=="Seven"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Seven</option>
                                    <option value="Eight"
                                    <?php
                                        if($student['class_name']=="Eight"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Eight</option>
                                    <option value="Nine"
                                    <?php
                                        if($student['class_name']=="Nine"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Nine</option>
                                    <option value="Ten"
                                    <?php
                                        if($student['class_name']=="Ten"){
                                            echo "selected";
                                        }
                                    ?>
                                    >Ten</option>
                                </select>
                                <span class="text-danger font-weight-bold" id="classError"></span>
                            </div>
                            <div class="form-group float-right">
                                <label for="firstName">Section</label>
                                <select class="form-control" name="section" id="section" required disabled>
                                    <option value="">--Select Section--</option>
                                    <option value="A"
                                    <?php
                                        if($classData['section']=="A"){
                                            echo "selected";
                                        }
                                    ?>
                                    >A</option>
                                    <option value="B"
                                    <?php
                                        if($classData['section']=="B"){
                                            echo "selected";
                                        }
                                    ?>
                                    >B</option>
                                </select>
                                <span class="text-danger font-weight-bold" id="sectionError"></span>
                            </div>
                        </div>

                        <div class="form-group my-2">
                            <label for="gender" class="mr-5">Gender</label>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="maleOption" value="Male"
                                <?php
                                        if($student['gender']=="Male"){
                                            echo "checked";
                                        }else{
                                            echo "disabled";
                                        }
                                    ?>
                                >
                                <label class="form-check-label font-weight-normal">
                                    Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="femaleOption" value="Female"
                                <?php
                                        if($student['gender']=="Female"){
                                            echo "checked";
                                        }
                                        else{
                                            echo "disabled";
                                        }
                                    ?>
                                >
                                <label class="form-check-label font-weight-normal" for="femaleOption">
                                    Female
                                </label>
                            </div>
                            <span id="genderError"></span>
                        </div>

                        <div class="form-group">
                            <label for="mobileNumber">Mobile Number</label>
                            <input class="form-control" required type="number" name="studentMobileNo"
                                id="studentMobileNo" placeholder="e.g. 03XXXXXXXXX" value="<?php echo $student['mobile_number']; ?>">
                            <span class="text-danger font-weight-bold" id="studentMobileNoError"></span>
                        </div>

                        <div class="form-group">
                            <label for="cnic">CNIC (National Identity Card)</label>
                            <input class="form-control" required type="text" name="studentCnic" id="studentCnic"
                                placeholder="e.g. XXXXX-XXXXXXX-X" value="<?php echo $student['cnic']; ?>" readonly> 
                            <span class="text-danger font-weight-bold" id="studentCnicError"></span>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" required name="studentAddress" id="studentAddress"
                                rows="3"><?php echo $student['address']; ?></textarea>
                        </div>

                        <div class="form-group">
                                <label for="">Blood Group</label>
                                <select class="form-control" name="bloodGroup" id="bloodGroup" required disabled>
                                    <option value="">--Select Your Blood Group--</option>
                                    <option value="A+"
                                    <?php
                                        if($student['blood_group']=="A+"){
                                            echo "selected";
                                        }
                                    ?>
                                    >A+</option>
                                    <option value="A-"
                                    <?php
                                        if($student['blood_group']=="A-"){
                                            echo "selected";
                                        }
                                    ?>
                                    >A-</option>
                                    <option value="B+"
                                    <?php
                                        if($student['blood_group']=="B+"){
                                            echo "selected";
                                        }
                                    ?>
                                    >B+</option>
                                    <option value="B-"
                                    <?php
                                        if($student['blood_group']=="B-"){
                                            echo "selected";
                                        }
                                    ?>
                                    >B-</option>
                                    <option value="AB+"
                                    <?php
                                        if($student['blood_group']=="AB+"){
                                            echo "selected";
                                        }
                                    ?>
                                    >AB+</option>
                                    <option value="AB-"
                                    <?php
                                        if($student['blood_group']=="AB-"){
                                            echo "selected";
                                        }
                                    ?>
                                    >AB-</option>
                                    <option value="O+"
                                    <?php
                                        if($student['blood_group']=="O+"){
                                            echo "selected";
                                        }
                                    ?>
                                    >O+</option>
                                    <option value="O-"
                                    <?php
                                        if($student['blood_group']=="O-"){
                                            echo "selected";
                                        }
                                    ?>
                                    >O-</option>
                                </select>
                            </div>

                    </div>

                    <div class="px-5 py-3 mb-5 border" id="parent-info">

                        <?php
                            $query = "SELECT * from Parents WHERE parent_id = '$parent_id'";
                            $result = mysqli_query($connection,$query);
                            if(mysqli_num_rows($result)>0){
                                $parent = mysqli_fetch_array($result);
                        ?>

                        <h5 class="text-primary mb-3"><b>Parent Information</b></h5>

                        <div class="clearfix name-container">
                            <div class="form-group float-left">
                                <label for="parentFirstName">First Name</label>
                                <input type="text" name="parentFirstName" required id="parentFirstName"
                                    class="form-control mr-5" value="<?php echo $parent['first_name']; ?>">
                                <span class="text-danger font-weight-bold" id="parentFirstNameError"></span>
                            </div>
                            <div class="form-group float-right">
                                <label for="parentLastName">Last Name</label>
                                <input type="text" name="parentLastName" required id="parentLastName"
                                    class="form-control" value="<?php echo $parent['last_name']; ?>">
                                <span class="text-danger font-weight-bold" id="parentLastNameError"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="parentMobileNo">Mobile Number</label>
                            <input class="form-control" required type="number" name="parentMobileNo" id="parentMobileNo"
                                placeholder="e.g. 03XX-XXXXXXX" value="<?php echo $parent['mobile_number']; ?>">
                            <span class="text-danger font-weight-bold" id="parentMobileNoError"></span>
                        </div>

                        <div class="form-group">
                            <label for="parentEmail">Email</label>
                            <input type="text" name="parentEmail" id="parentEmail" class="form-control"
                                placeholder="yourname@gmail.com" value="<?php echo $parent['email']; ?>" readonly>
                            <span class="text-danger font-weight-bold" id="parentEmailError"></span>
                        </div>

                        <div class="form-group">
                            <label for="parentCnic">CNIC (National Identity Card)</label>
                            <input class="form-control" required type="text" name="parentCnic" id="parentCnic"
                                placeholder="e.g. XXXXXXXXXXXXX" value="<?php echo $parent['cnic']; ?>" readonly>
                            <span class="text-danger font-weight-bold" id="parentCnicError"></span>
                        </div>

                        <div class="form-group">
                            <label for="parentAddress">Address</label>
                            <textarea class="form-control" name="parentAddress" id="parentAddress" rows="3"><?php echo $parent['address']; ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="parentOccupation">Occupation</label>
                            <input class="form-control" required type="text" name="parentOccupation"
                                id="parentOccupation" placeholder="e.g. Policeman" value="<?php echo $parent['occupation']; ?>" readonly>
                            <span class="text-danger font-weight-bold" id="occupationError"></span>
                        </div>

                        <div class="form-group">
                            <label for="parentDesignation">Designation</label>
                            <input class="form-control" type="text" name="parentDesignation"
                                id="parentDesignation" placeholder="e.g. SSP" value="<?php echo $parent['designation']; ?>" readonly>
                            <span class="text-danger font-weight-bold" id="designationError"></span>
                        </div>
                        <?php
                            } // If Closing in Parent Info
                        ?>
                    </div>

                    <div class="px-5 py-3 mb-3 border" id="account-info">
                        <h5 class="text-primary mb-3"><b>Account Information</b></h5>

                        <div class="form-group">
                            <label for="studentEmail">Email</label>
                            <input class="form-control" required type="email" name="studentEmail" id="studentEmail"
                                placeholder="yourname@gmail.com" value="<?php echo $student['email'] ?>" readonly>
                            <span class="text-danger font-weight-bold" id="studentEmailError"></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" required type="password" name="password" id="password" value="<?php echo $student['password'] ?>" readonly>
                            <span class="text-danger font-weight-bold" id="passwordError"></span>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input class="form-control" required type="password" name="confirmPassword"
                                id="confirmPassword" value="<?php echo $student['password'] ?>" readonly>
                            <span class="text-danger font-weight-bold" id="confirmPassword"></span>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary w-100" name='submit'>Save Changes</button>

                </form>


            </div>

            <?php
                } // if closing
            ?>

            <div class="card p-4 bg-white" id="footer">
                Developed by : <b>Muhammad Haris </b>
            </div>



        </div>
        <!-- Content End -->


    </div>
    <!-- Wrapper End     -->

</body>

</html>