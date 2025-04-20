<?php

require("Included_Files/connection.php");

$emp_id = $_GET['id'];

$del = $connection->query("DELETE FROM `employees` WHERE id = $emp_id ");

if($del) {
    session_start();
    $_SESSION['delMessage'] = "You Are Deleted Employee Successful";
    header("Location: home.php");
}

?>