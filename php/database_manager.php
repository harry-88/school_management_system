<?php
include 'connection.php';

function getClassId($className){
    $query = "SELECT * class_id FROM Classes WHERE class_name = $className";
    $classID = mysqli_query($connection,$query);

    return classID;
}


?>