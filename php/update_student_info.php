<?php
include 'connection.php';

if(isset($_POST['submit'])){
    
    $studentFirstName = $_POST['studentFirstName'];
    $studentLastName = $_POST['studentLastName'];
    // $studentClass = $_POST['studentClass'];
    // $section = $_POST['section'];
    $studentMobileNo = $_POST['studentMobileNo'];
    $studentAddress = $_POST['studentAddress'];
    // $password = $_POST['password'];
    $studentCnic = $_POST['studentCnic'];

    // Parent Data
    $parentFirstName = $_POST['parentFirstName'];
    $parentLastName = $_POST['parentLastName'];
    $parentMobileNo = $_POST['parentMobileNo'];
    $parentAddress = $_POST['parentAddress'];
    $parentCnic = $_POST['parentCnic'];


    $query = "UPDATE Students SET first_name = '$studentFirstName', last_name = '$studentLastName', mobile_number = '$studentMobileNo', address = '$studentAddress' WHERE cnic = '$studentCnic'";
    $studentUpdationStatus = mysqli_query($connection,$query);

    $query = "UPDATE Parents SET first_name = '$parentFirstName', last_name = '$parentLastName', mobile_number = '$parentMobileNo', address = '$parentAddress' WHERE cnic = '$parentCnic'";
    $parentUpdationStatus = mysqli_query($connection,$query);
    
    if($studentUpdationStatus===true && $parentUpdationStatus===true){
        echo "<script>alert('Student Info updated successfully!')</script>";
        header("Location: manage_students.php");
    }else{
        echo "<script>alert('Error! Student Info not edited.')</script>";
    }
}



?>