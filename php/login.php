<?php
// session_start();
include 'DBManager.php';

if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $password = password_hash($password,PASSWORD_BCRYPT);
    
    
    // Identification of User
    // 0->Admin,  1->Teacher, 2->Student
    if(identifyUser($email,$password)==0){
        header("Location: http://localhost/ePortal-System/php/admin_dashboard.php",true,301);
    }else if(identifyUser($email,$password)==1){
        $teacherID = $currentUser['teacher_id'];
        header("Location: teacher_dashboard.php?id='$teacherID'");
    }else if(identifyUser($email,$password)==2){ 
        $studentID = $currentUser['student_id'];
        header("Location: student_dashboard.php?id='$studentID'"); 
        // header("Location: http://localhost/ePortal-System/php/student_dashboard.php",true,301);
    }else{
        
        

    }
    
}

?>