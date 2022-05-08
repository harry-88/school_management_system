<?php
include 'connection.php';

function deleteStudent($id){
    global $connection;

    echo $id;
    // $query = "DELETE * from Students WHERE student_id = '$id'";
    // $result = mysqli_query($connection,$query);
    
    // if($result){
    //     header("Location: http://localhost/ePortal-System/php/manage_students.php",true,301);
    // }
}

function isParentAlreadyExists($cnic){
    global $connection,$result;

    $query = "SELECT * from Parents WHERE cnic = '$cnic'";
    $result = mysqli_query($connection,$query);
    $noOfRows = mysqli_num_rows($result);
    
    if($noOfRows>0){
        return true;
    }else{
        return false;
    }
}

function getParentID($cnic){
    global $connection,$result;

    $query = "SELECT parent_id from Parents WHERE cnic = '$cnic'";

    $result = mysqli_query($connection,$query);
    $parentData = mysqli_fetch_array($result);

    return $parentData['parent_id'];
}

function getStudentID($email, $password){

    global $connection,$query,$currentUser;

    $query = "SELECT student_id FROM Students WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($connection,$query);

    if($result){
        return mysqli_fetch_array($result)['student_id'];
    }

    return -1;
}

function getTeacherID($email){
    global $connection,$query;

    $query = "SELECT teacher_id FROM Students WHERE email = '$email'";

    $result = mysqli_query($connection,$query);

    if($result){
        return mysqli_fetch_array($result)['teacher_id'];
    }
    
    return -1;
}

function identifyUser($email, $password){
    global $connection, $currentUser;
    
    if($email=="admin" && $password=="admin"){
        return 0;
    }else{

        $encryptedPassword = encryptPassword($password);

        $query = "SELECT * from Teachers WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($connection,$query);
        
        if(mysqli_num_rows($result)>0){
            $currentUser = mysqli_fetch_array($result);
            return 1;
        }else{

            $query = "SELECT * from Students WHERE email = '$email' and password = '$password'";
            $result = mysqli_query($connection,$query);

            if(mysqli_num_rows($result)>0){
                $currentUser = mysqli_fetch_array($result);
                return 2;
            }

        }
    }

    

}

function studentCnicRepetition($studentCnic){
    global $connection,$result;

    $query = "SELECT * from Students WHERE cnic = '$studentCnic'";
    $result = mysqli_query($connection,$query);
    $noOfRows = mysqli_num_rows($result);
    
    if($noOfRows>0){
        return true;
    }else{
        return false;
    }
}

function studentEmailRepetition($email){
    global $connection,$result;

    $query = "SELECT * from Students WHERE email = '$email'";
    $result = mysqli_query($connection,$query);
    $noOfRows = mysqli_num_rows($result);
    
    if($noOfRows>0){
        return true;
    }else{
        return false;
    }
}

function parentCnicRepetition($parentCnic){
    global $connection,$result;

    $query = "SELECT * from Parents WHERE cnic = '$parentCnic'";
    $result = mysqli_query($connection,$query);
    $noOfRows = mysqli_num_rows($result);
    
    if($noOfRows>0){
        return true;
    }else{
        return false;
    }

}

function parentEmailRepetition($email){
    global $connection,$result;

    $query = "SELECT * from Parents WHERE email = '$email'";
    $result = mysqli_query($connection,$query);
    $noOfRows = mysqli_num_rows($result);
    
    if($noOfRows>0){
        return true;
    }else{
        return false;
    }
}

function encryptPassword($password){
      
    $encryptedPassword = password_hash($password,PASSWORD_BCRYPT);

    return $encryptedPassword;
}

function verifyPassword($password,$hash){
    $verification = password_verify($password,$hash);

    return $verification;
}

?>