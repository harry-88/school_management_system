<?php


include 'connection.php';

if (isset($_POST['submit'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $mobileNumber = $_POST['mobileNumber'];
    $address = $_POST['address'];
    $cnic = $_POST['cnic'];
    $qualification = $_POST['qualification'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encryptedPass = password_hash($password, PASSWORD_BCRYPT);



    $da = date("Y/m/d");
    $query = "INSERT INTO Teachers(first_name,last_name,mobile_number,cnic,address,gender,qualification,subject,joining_date,email,password,account_status) VALUES('$firstName','$lastName','$mobileNumber','$address','$cnic','$gender','$qualification','$subject','$da','$email','$encryptedPass','1')";

    $result = mysqli_query($connection, $query);

    echo $result;
    
    if ($result) {

        echo '<script>confirm("teacher added successfully")</script>';
        ?><script>location.replace("manage_teachers.php")</script><?php
        
    } else {
        echo "<script>alert('Error! Some problem while insert the teacher')</script>";
        echo mysqli_error($connection);
    }
}

?>