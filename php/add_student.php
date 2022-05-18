<?php
include 'DBManager.php';


if (isset($_POST['submit'])) {

    // Students Data
    $studentFirstName = $_POST['studentFirstName'];
    $studentLastName = $_POST['studentLastName'];
    $studentClass = $_POST['studentClass'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $studentMobileNo = $_POST['studentMobileNo'];
    $studentCnic = $_POST['studentCnic'];
    $studentAddress = $_POST['studentAddress'];
    $bloodGroup = $_POST['bloodGroup'];
    $studentEmail = $_POST['studentEmail'];
    $password = $_POST['password'];
    $encryptedPass = password_hash($password,PASSWORD_BCRYPT  );

    // Parent Data
    $parentFirstName = $_POST['parentFirstName'];
    $parentLastname = $_POST['parentLastname'];
    $parentMobileNo = $_POST['parentMobileNo'];
    $parentEmail = $_POST['parentEmail'];
    $parentCnic = $_POST['parentCnic'];
    $parentAddress = $_POST['parentAddress'];
    $parentOccupation = $_POST['parentOccupation'];
    $parentDesignation = $_POST['parentDesignation'];

    // Check if Parent Data already exits or not
    $query = "SELECT * from Parents WHERE cnic = '$parentCnic'";
    $result = mysqli_query($connection, $query);
    

    // If Parent Info already exists, then no need to insert Parent Data into DB,
    if (mysqli_num_rows($result) > 0) {
        
        // Get Parent ID from DB and Insert into Student Table for parent reference
        $parentID = getParentID($parentCnic);
        $query = "INSERT INTO Students(first_name,last_name,class_name,mobile_number,cnic,address,gender,blood_group,email,password,parent_id,account_status) values('$studentFirstName','$studentLastName','$studentClass','$studentMobileNo','$studentCnic','$studentAddress','$gender','$bloodGroup','$studentEmail','$encryptedPass','$parentID','1')";

        $result = mysqli_query($connection, $query);
        echo mysqli_error($connection);

        
        if ($result) {
            echo "<script>alert('Student registered successfully!')</script>";
            header("Location: manage_students.php");
        } else {
            echo "<script>alert('OOPs!Some error occure. Student not registered')</script>";
            header("Location: manage_students.php");
        }
    } else {

        
        // If parent data not exists, then first insert parent data, then get parent id
        // from Parent Table and insert student data with parent id as parent reference


        $query = "INSERT into Parents(first_name,last_name,mobile_number,cnic,email,address,occupation,designation) values('$parentFirstName','$parentLastname','$parentMobileNo','$parentCnic','$parentEmail','$parentAddress','$parentOccupation','$parentDesignation')";
        $result = mysqli_query($connection, $query);
        echo mysqli_error(($connection));
        if ($result) {

            $parentID = getParentID($parentCnic);
            $query = "INSERT INTO Students(first_name,last_name,class_name,mobile_number,cnic,address,gender,blood_group,email,password,parent_id,account_status) values('$studentFirstName','$studentLastName','$studentClass','$studentMobileNo','$studentCnic','$studentAddress','$gender','$bloodGroup','$studentEmail','$encryptedPass','$parentID','1')";
            $result = mysqli_query($connection, $query);
            echo $parentID;
            echo mysqli_error($connection);

            if ($result) {
                header("Location: manage_students.php");
            }
        } else {
            echo "<script>alert('OOPs!Some error occure. Student not registered')</script>";
            header("Location: manage_students.php");
        }
    }
    
}
