<?php
session_start();

if(!isset($_SESSION['currentUserId'])){

    ?><script>
        alert("You are logged out. Please login again");
        location.replace("../index.php");
    </script><?php   
}


include 'DBManager.php';

if(isset($_POST['submit'])){
    
    $assessmentId = $_GET['id'];
    $assessmentName = $_POST['assessmentName'];
    $subjectName = $_POST['subjectName'];
    $totalMarks = $_POST['totalMarks'];
    $obtainedMarks = $_POST['obtainedMarks'];
    
    $query = "UPDATE Assessments SET assessment_name = '$assessmentName', subject_title = '$subjectName', total_marks = '$totalMarks', obtained_marks = '$obtainedMarks' where assessment_id = $assessmentId";
    $result = mysqli_query($connection,$query);
    if($result){
        echo '<script>confirm("Assessment updated successfully")</script>';
        ?><script>location.replace("student_assessments.php")</script><?php
    }else{
        echo '<script>confirm("Error! Assessment not updated")</script>';
    }
}

?>