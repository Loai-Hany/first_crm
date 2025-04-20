<?php

require("Included_Files/connection.php");
$employees = $connection->query(" SELECT * FROM `employees` ");

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

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">Empolyees Data</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="insert.php">Insert Employee</a>
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

  </nav>

  <button class="up-btn" id="btnToUp">UP <i class="fa-solid fa-arrow-up"></i></button>
  <button class="moon" id="myMoon"><i class="fa-solid fa-moon"></i></button>


  <div class="container">


    <?php
    if (isset($_SESSION['successMessage']) && $_SESSION['successMessage'] != "") { ?>

      <div class="alert alert-success mx-auto my-5 text-center fs-5">
        <?= $_SESSION['successMessage'] ?>
      </div>

    <?php } ?>

    <?php
    if (isset($_SESSION['delMessage']) && $_SESSION['delMessage'] != "") { ?>

      <div class="alert alert-danger mx-auto my-5 text-center fs-5">
        <?= $_SESSION['delMessage'] ?>
      </div>

    <?php } ?>

    <?php
    if (isset($_SESSION['updateMessage']) && $_SESSION['updateMessage'] != "") { ?>

      <div class="alert alert-warning mx-auto my-5 text-center fs-5">
        <?= $_SESSION['updateMessage'] ?>
      </div>

    <?php } ?>



    <h1 class="text-center my-5 text-primary">Empolyees Data</h1>

    <table class="table text-center">
      <thead class="table-dark">
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Department</th>
        <th>Salary</th>
        <th>Join Data</th>
        <th>Gender</th>
        <th>Status</th>
        <th>Position</th>
        <th>Address</th>
        <th>DateOfBirth</th>
        <th>Actions</th>
      </thead>
      <tbody id="row">
        <?php foreach ($employees as $emp) { ?>
          <tr>
            <td><?= $emp['id'] ?></td>
            <td> <img src="<?= $emp['image'] ?>" class="rounded-pill" width="45px"> </td>
            <td><?= $emp['name'] ?></td>
            <td><?= $emp['email'] ?></td>
            <td><?= $emp['phone'] ?></td>
            <td>
              <?php
              $id_Department = $emp['department_id'];
              $result = $connection->query("SELECT `dname` FROM `departments` WHERE id = $id_Department");
              echo $result->fetch_assoc()['dname'];
              // foreach ($result as $dname) {
              //   echo $dname['dname'];
              // }
              ?>
            </td>
            <td><?= $emp['salary'] ?></td>
            <td><?= $emp['joindate'] ?></td>
            <td><?= $emp['gender'] ?></td>
            <td><?= $emp['status'] ?></td>
            <td><?= $emp['position'] ?></td>
            <td><?= $emp['address'] ?></td>
            <td><?= $emp['birthdate'] ?></td>
            <td>
              <a href="edite.php?id=<?= $emp['id'] ?>">
                <button class="btn btn-warning">
                  <i class="fa fa-edit"></i>
                </button>
              </a>
              <a onclick="return confirm('Are You Sure To Delete <?= $emp['name'] ?> ?') " href="deleted.php?id=<?= $emp['id'] ?>">
                <button class="btn btn-danger">
                  <i class="fa fa-trash"></i>
                </button>
              </a>
            </td>
          </tr>

        <?php } ?>

      </tbody>
    </table>
  </div>



  <script src="JS/bootstrap.js"></script>
  <script src="JS/main.js"></script>
</body>

</html>

<?php
$_SESSION['successMessage'] = "";
$_SESSION['delMessage'] = "";
$_SESSION['updateMessage'] = "";


/*

=> Global Query To Recive All Data From Two Tables (employees & departments) .

SELECT * FROM employees e , departments d WHERE e.department_id = d.id   

SELECT employees.* , departments.* FROM employees , departments  WHERE e.department_id = d.id  

*/