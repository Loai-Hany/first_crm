<?php

require("Included_Files/connection.php");
require("Included_Files/functions.php");

$emp_id = $_POST['id'];
$current_name = $_POST['username'];
$current_email = $_POST['email'];
$current_phone = $_POST['phone'];
$current_address = $_POST['address'];
$current_position = $_POST['position'];
$current_salary = $_POST['salary'];
$current_joindate = $_POST['joindate'];
$current_birthdate = $_POST['birthdate'];
$current_department_id = $_POST['department_id'];
$current_gender = $_POST['gender'];
$current_status = $_POST['status'];
$current_path = UploadFile("profileimg");



if($_FILES['profileimg']['error'] > 0) {
    $updateEmployee = $connection->query("UPDATE `employees` SET `name`='$current_name' , `email`='$current_email' , `phone`='$current_phone' , 
      `address`='$current_address' , `position`='$current_position' , `salary`='$current_salary' , `joindate`='$current_joindate' ,
      `birthdate`='$current_birthdate' , `department_id`='$current_department_id' , `gender`='$current_gender' , `status`='$current_status' 
       WHERE id = $emp_id ");
    
    if($updateEmployee) {
        session_start();
        $_SESSION['updateMessage'] = "You Are Updated Employee Successful";
        header("Location: home.php");
    }
} else {
    
    $updateEmployee = $connection->query("UPDATE `employees` SET `name`='$current_name' , `email`='$current_email' , `phone`='$current_phone' , 
    `address`='$current_address' , `position`='$current_position' , `salary`='$current_salary' , `joindate`='$current_joindate' ,
    `birthdate`='$current_birthdate' , `department_id`='$current_department_id' , `gender`='$current_gender' , `status`='$current_status' 
     `image`='$current_path' WHERE id = $emp_id ");
    if($updateEmployee) {
        session_start();
        $_SESSION['updateMessage'] = "You Are Updated Employee Successful";
        header("Location: home.php");
    }
}


?>