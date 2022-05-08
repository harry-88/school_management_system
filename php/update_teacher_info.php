<?php
session_start();

if(!isset($_SESSION['currentUserId'])){

    ?><script>
        alert("You are logged out. Please login again");
        location.replace("../index.php");
    </script><?php   
}


?>
<?php
include 'connection.php';

if(isset($_POST['submit'])){
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $mobileNumber = $_POST['mobileNumber'];
    $cnic = $_POST['cnic'];
    $address = $_POST['address'];
    $qualification = $_POST['qualification'];
    $subject = $_POST['subject'];

    


    $query = "UPDATE Teachers SET first_name = '$firstName', last_name = '$lastName', mobile_number = '$mobileNumber', address = '$address', qualification = '$qualification', subject = '$subject' WHERE cnic = '$cnic'";
    $teacherUpdationStatus = mysqli_query($connection,$query);

    if($teacherUpdationStatus==true){
        echo "<script>alert('Teacher Info updated successfully')</script>";
        ?><script>location.replace("manage_teachers.php")</script><?php
    }else{
        echo "<script>alert('Error! Student Info not edited.')</script>";
    }
}



?>