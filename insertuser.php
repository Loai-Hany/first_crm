<?php


require("Included_Files/connection.php");
require("Included_Files/functions.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
$name = $_POST['username'];
$path = UploadFile("image");
$email = $_POST['email'];
$password = $_POST['password'];
// Encrypted Password
$hashedPassword = md5($password);


$selectEmail = $connection->query("SELECT * From `user` WHERE email='$email' ");

    
if($selectEmail->num_rows == 0) {
    
    if($_FILES['image']['error'] > 0) {
        $insertUser = $connection->query("INSERT INTO `user`(`id`,`name`,`email`,`password`,`date`) VALUES(NULL,'$name','$email','$hashedPassword',NOW() ) ");
        if($insertUser) {
            header('Location: index.php');
     }
    } else {
        $insertUser = $connection->query("INSERT INTO `user`(`id`,`name`,`image`,`email`,`password`,`date`) VALUES(NULL,'$name','$path','$email','$hashedPassword',NOW() ) ");
        if($insertUser) {
            header('Location: index.php');
        }
    }


} else {
    session_start();
    $_SESSION["emailExisted"] = "This Email Already been Exist In Database, Chang Your Email Please";
    header('Location: register.php');
}


}  else {
    echo "You Can't Access Here";
}

