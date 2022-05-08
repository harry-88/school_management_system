<?php
session_start();
include 'DBManager.php';

if(isset($_POST['submit'])){

    $studentId = $_SESSION['currentUserId'];

    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $query = "SELECT password from Students WHERE student_id = $studentId";
    $result = mysqli_query($connection,$query);

    if($result){

        $studentInfo = mysqli_fetch_array($result);

        $verify = password_verify($oldPassword,$studentInfo['password']);
        
        if($verify){

            $newPasswordHash = password_hash($newPassword,PASSWORD_BCRYPT);

            echo '<script>confirm("Do you really want to change password?")</script>';
        
            
            $query = "UPDATE Students SET password = '$newPasswordHash' WHERE student_id = $studentId";
            $result = mysqli_query($connection,$query);
            if($result){
                ?>
                    <script>
                        alert("Password changed successfully!")
                        location.replace("logout.php");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("Error! Password not changed");
                        // location.reload();
                    </script>
                <?php
            }

        }else{
            ?>
                <script>
                    alert("Wrong Password! Enter your old password first to change password");
                    location.replace("change_student_password_form.php");
                </script>
            <?php
        }
        
    }


}




?>