<?php
include 'DBManager.php';


if(isset($_POST['submit'])){

    $studentId = $_POST['studentId'];
    $assessmentName = $_POST['assessmentName'];
    $subjectName = $_POST['subjectName'];
    $totalMarks = $_POST['totalMarks'];
    $obtainedMarks = $_POST['obtainedMarks'];

    $query = "INSERT INTO Assessments(student_id,assessment_name,subject_title,totla_marks,obtained_marks) VALUES($studentId,'$assessmentName','$subjectName',$totalMarks,$obtainedMarks)";
    $result = mysqli_query($connection,$query);
    echo mysqli_error($connection);
    if($result){
        echo '<script>confirm("Student Assessment added successfully")</script>';
        // ?><script>location.replace("student_assessments.php")</script><?php
    }else{
        echo "<script>alert('Error! Assessment not inserted')</script>";
    }

}


?>