<?php
session_start();

if(!isset($_SESSION['currentUserId'])){

    ?><script>
        alert("You are logged out. Please login again");
        location.replace("../index.php");
    </script><?php   
}


include 'DBManager.php';

$assessmentId = $_GET['id'];


?>
<script>confirm("Do you really want to delete assessment?")</script>
<?php

$query = "DELETE from Assessments where assessment_id = $assessmentId";
$result = mysqli_query($connection,$query);

if($result){
    ?>
        <script>
            alert("Assessment deleted successfully!");
            location.replace("student_assessments.php");
        </script>
    <?php
}else{
    ?>
        <script>
            alert("Error! Assessment not deleted");
            location.replace("student_assessments.php");
        </script>
    <?php
}

?>