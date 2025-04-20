<?php

require("Included_Files/connection.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    

$email = $_POST['email'];
$password = $_POST['password'];
// Encrypted Password
$hashedPassword = md5($password);


$selectUser = $connection->query("SELECT * FROM `user` WHERE email='$email' AND password='$hashedPassword' ");
$user = $selectUser->fetch_assoc();

if($selectUser->num_rows) {
    session_start();
    $_SESSION['user'] = $user;
    header('Location: home.php');
} else {
    session_start();
    $_SESSION['errorMessage'] = "You Have Error Your Email/Password Is Not Valid!";
    header('Location: index.php');
}


}  else {
    echo "You Can't Access Here";
}

