<?php

function UploadFile($myfile) {

if($_SERVER["REQUEST_METHOD"] == "POST") {

$fileName = $_FILES[$myfile]["name"];
$fileType = $_FILES[$myfile]["type"];
$fileSize = $_FILES[$myfile]["size"];
$fileError = $_FILES[$myfile]["error"];
$fileTmp_Name = $_FILES[$myfile]["tmp_name"];

$rand = rand();
$time = time();
$path = "Images/$rand$time$fileName";

move_uploaded_file($fileTmp_Name , $path);

return $path;

} else 
    header("Location: addNewEmployee.php");
}

?>