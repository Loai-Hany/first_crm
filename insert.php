<?php

$color = "";
if (isset($_GET["color"])) {
   $color = $_GET["color"];
   setcookie("myColor", $color, (time() + 86400));
}
if (isset($_COOKIE["myColor"])) {
   $color = $_COOKIE["myColor"];
}

session_start();  // Start New Session / Continue Old Session 
if (isset($_SESSION['user'])) {
   $user = $_SESSION['user'];
} else {
   header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Empolyees</title>
   <!-- FontAwesome Library -->
   <link rel="stylesheet" href="CSS/all.min.css">
   <!-- Bootstrab -->
   <link rel="stylesheet" href="CSS/bootstrap.css">
   <!-- Main CSS File -->
   <link rel="stylesheet" href="CSS/main.css">
</head>

<body style="background-color: <?= $color ?>">

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
         <a class="navbar-brand" href="home.php">Empolyees Data</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="home.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="insert.php">Insert Employee</a>
               </li>

               <?php if (isset($_SESSION['user'])) { ?>
                  <li class="nav-item">
                     <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                  </li>
               <?php } ?>

               <li class="nav-item">
                  <img src="<?= $user['image'] ?>" style="width: 40px; border-radius: 50%; cursor: pointer; position:absolute; right: 200px;">
               </li>

            </ul>

         </div>
      </div>
   </nav>

   <div class="container">
      <h1 class="text-center my-5 text-primary">Add New Empolyees</h1>

      <form class="w-75 mx-auto" action="addNewEmployee.php" method="post" enctype="multipart/form-data">
         <div class="row">

            <div class="col-md-4">
               <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="username" class="form-control" id="name"
                     placeholder="Enter Employee Name" autofocus required>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="Email1" class="form-label">Email Address</label>
                  <input type="email" name="email" class="form-control" id="Email1"
                     placeholder="Enter Employee Email" required>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control" id="phone"
                     placeholder="Enter Employee Phone" required>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" name="address" class="form-control" id="address"
                     placeholder="Enter Employee Address" required>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="position" class="form-label">Position</label>
                  <input type="text" name="position" class="form-control" id="position"
                     placeholder="Enter Employee Position" required>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="salary" class="form-label">Salary</label>
                  <input type="number" name="salary" class="form-control" id="salary"
                     placeholder="Enter Employee Salary" required>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="joindate" class="form-label">Join Date</label>
                  <input type="date" name="joindate" class="form-control" id="joindate"
                     placeholder="Enter Employee Join Of Date" required>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="birthdate" class="form-label">Date Of Birth</label>
                  <input type="date" name="birthdate" class="form-control" id="birthdate"
                     placeholder="Enter Employee Date Of Birth" required>
               </div>
            </div>

            <div class="col-md-4">
               <div class="mb-3">
                  <label for="departments" class="form-label">Departments</label>
                  <select class="form-control" name="department_id" id="departments">
                     <?php
                     require("Included_Files/connection.php");
                     $resultDepm = $connection->query("SELECT * FROM `departments`");
                     foreach ($resultDepm as $result) {
                     ?>
                        <option value="<?= $result['id'] ?>"><?= $result['dname'] ?></option>

                     <?php } ?>
                  </select>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="gender" class="form-label">Gender : </label>
                  <br>
                  <input type="radio" name="gender" value="male" id="male" checked style="cursor: pointer">
                  <label for="male" style="cursor: pointer">Male</label>
                  <input type="radio" name="gender" value="female" id="female" style="cursor: pointer">
                  <label for="female" style="cursor: pointer">Female</label>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="status" class="form-label">Status : </label>
                  <br>
                  <input type="radio" name="status" value="single" id="single" checked style="cursor: pointer">
                  <label for="single" style="cursor: pointer">Single</label>
                  <input type="radio" name="status" value="marrid" id="marrid" style="cursor: pointer">
                  <label for="marrid" style="cursor: pointer">Marrid</label>
               </div>
            </div>


            <div class="col-md-4">
               <div class="mb-3">
                  <label for="exampleCheck1" class="form-label">Choose Profile Image</label>
                  <input type="file" name="profileimg" class="form-control" id="exampleCheck1">
               </div>
            </div>


         </div>

         <button type="submit" class="btn btn-primary mt-4 w-100"><i class="fa fa-plus"></i> Add Employee</button>

      </form>

      <form action="" method="GET">
         <div class="row w-50 mx-auto my-5">
            <div class="col-md-12">
               <div class="mb-3">
                  <input type="color" name="color" value="<?= $color ?>" class="form-control">
                  <button type="submit" class="btn btn-danger mt-2 w-100 text-light">Change Background Color</button>
               </div>
            </div>
         </div>
      </form>

   </div>

   <script src="JS/bootstrap.js"></script>
   <script src="JS/main.js"></script>
</body>

</html>