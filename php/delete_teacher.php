<?php
session_start();

if(!isset($_SESSION['currentUserId'])){

    ?><script>
        alert("You are logged out. Please login again");
        location.replace("../index.php");
    </script><?php  
}

include 'DBManager.php';

$teacherId = $_GET['id'];

echo '<script>confirm("Do you really want to delete teacher?")</script>';

$query = "UPDATE Teachers SET account_status = 0 WHERE teacher_id = $teacherId";
$result = mysqli_query($connection,$query);

if($result){
    ?>
    <script>
        confirm("Teacher deleted successfully");
        location.replace("manage_teachers.php");
    </script>
    <?php
}

?>