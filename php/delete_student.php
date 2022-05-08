<?php
session_start();

if(!isset($_SESSION['currentUserId'])){

    ?><script>
        alert("You are logged out. Please login again");
        location.replace("../index.php");
    </script><?php   
}

include 'DBManager.php';

$studentId = $_GET['id'];

echo '<script>confirm("Do you really want to delete student?")</script>';

$query = "UPDATE Students SET account_status = 0 WHERE student_id = $studentId";
$result = mysqli_query($connection,$query);

if($result){
    echo '<script>confirm("Student deleted successfully")</script>';
    ?><script>location.replace("manage_students.php")</script><?php
}




?>