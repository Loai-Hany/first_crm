<?php

require("Included_Files/connection.php");
require("Included_Files/functions.php");

$name = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$position = $_POST['position'];
$salary = $_POST['salary'];
$joindate = $_POST['joindate'];
$birthdate = $_POST['birthdate'];
$department_id = $_POST['department_id'];
$gender = $_POST['gender'];
$status = $_POST['status'];
$path = UploadFile("profileimg");



if ($_FILES['profileimg']['error'] > 0) {
    $addEmployee = $connection->query(" INSERT INTO `employees` (`id`,`name`,`email`,`phone`,`address`,`position`,`salary`,
    `joindate`,`birthdate`,`department_id`,`gender`,`status`) VALUES (NULL,'$name','$email','$phone','$address','$position',$salary,
    '$joindate','$birthdate',$department_id,'$gender','$status') ");

    if ($addEmployee) {
        session_start();
        $_SESSION['successMessage'] = "You Are Inserted Employee Successful";
        header("Location: home.php");
    }
} else {
    $addEmployee = $connection->query(" INSERT INTO `employees` (`id`,`name`,`email`,`phone`,`address`,`position`,`salary`,
    `joindate`,`birthdate`,`department_id`,`gender`,`status`,`image`) VALUES (NULL,'$name','$email','$phone','$address','$position',$salary,
    '$joindate','$birthdate',$department_id,'$gender','$status','$path') ");

    if ($addEmployee) {
        session_start();
        $_SESSION['successMessage'] = "You Are Inserted Employee Successful";
        header("Location: home.php");
    }
}
