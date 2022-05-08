<?php

$serverName = 'localhost';
$username = 'root';
$passwrod = 'root';
$dbName = 'eportal';

$query = "";

$currentUser; // Data of Current User who is logged In

$connection = mysqli_connect($serverName,$username,$passwrod,$dbName);

if(!$connection){
    echo '<script>alert("Connection to Database failed!")</script>';

}else{
    // echo '<script>alert("Connection to Database successful!")</script>';
    createTables();
}

function createTables(){
    global $connection, $query;

    $query = "CREATE TABLE IF NOT EXISTS Parents(parent_id int auto_increment primary key, first_name varchar (100), last_name varchar (100), mobile_number varchar (100),cnic varchar (100),email varchar (100) unique, address varchar(100), occupation varchar (100), designation varchar (100))";

    mysqli_query($connection,$query);

    $query = "CREATE TABLE IF NOT EXISTS Teachers(teacher_id int auto_increment primary key, first_name varchar (100), last_name varchar (100), mobile_number varchar (100),cnic varchar(100),address varchar(100), gender varchar( 100), qualification varchar (100), subject varchar (100),joining_date date  , email varchar (100) unique, password varchar (100),account_status boolean)";

    mysqli_query($connection,$query);

    $query = "CREATE TABLE IF NOT EXISTS Classes(class_name varchar (100) primary key, section char(1),incharge_id int, foreign key(incharge_id) references teachers(teacher_id))";
    mysqli_query($connection,$query);

    $query = "CREATE TABLE IF NOT EXISTS Students(student_id int auto_increment, first_name varchar (100), last_name varchar (100),class_name varchar (100), mobile_number varchar (100),cnic varchar (100),address varchar(100), gender varchar( 100),blood_group char(3),email varchar (100) unique,password varchar (100),parent_id int,account_status boolean, primary key(student_id), foreign key(parent_id) references Parents(parent_id))";
    mysqli_query($connection,$query);

    $query = "CREATE TABLE IF NOT EXISTS Subjects(subject_id int primary key auto_increment, subject_title varchar (100),subject_type varchar (100),class_name varchar (100)";
    mysqli_query($connection,$query);

    $query = "CREATE TABLE IF NOT EXISTS subject_teached(teacher_id int,subject_id int, primary key(teacher_id,subject_id), foreign key(subject_id) references subjects(subject_id), foreign key(teacher_id) references Teachers(teacher_id))";
    mysqli_query($connection,$query);
    
    $query = "CREATE TABLE IF NOT EXISTS subjects_registered(subject_id int, student_id int,primary key(subject_id,student_id), foreign key(subject_id) references Subjects(subject_id), foreign key(student_id) references Students(student_id))";
    mysqli_query($connection,$query);

    $query = "CREATE TABLE IF NOT EXISTS assessments(assessment_id int primary key AUTO_INCREMENT,student_id int,assessment_name varchar (100),subject_title varchar (100),totla_marks int,obtained_marks int,date date  ,FOREIGN KEY(student_id) REFERENCES Students(student_id))";
    mysqli_query($connection,$query);

}

?>