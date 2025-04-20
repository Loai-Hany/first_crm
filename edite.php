<?php

require("Included_Files/connection.php");
$current_id = $_GET['id'];
// one recored will be return .
$result = $connection->query("SELECT * FROM `employees` WHERE id = $current_id ");
// $data = $result->fetch_assoc();

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

<body style="background-image: linear-gradient(to right , #0dcaf0 , #d63384)">

   <div class="container">
      <h1 class="text-center my-5 text-warning">Edite Current Empolyee</h1>

      <form class="w-75 mx-auto" action="update.php" method="post" enctype="multipart/form-data">
         <div class="row">

            <?php foreach ($result as $res) { ?>
               <img src="<?= $res['image'] ?>" style="width: 160px; border-radius: 50%; margin: 10px auto">

               <div class="mb-3">
                  <input type="text" hidden name="id" class="form-control" value=<?= $res['id'] ?>>
               </div>

               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="name" class="form-label">Name</label>
                     <input type="text" name="username" class="form-control" id="name"
                        placeholder="Enter Employee Name" autofocus required value="<?= $res['name'] ?>">
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="Email1" class="form-label">Email Address</label>
                     <input type="email" name="email" class="form-control" id="Email1"
                        placeholder="Enter Employee Email" required value="<?= $res['email'] ?>">
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="phone" class="form-label">Phone</label>
                     <input type="text" name="phone" class="form-control" id="phone"
                        placeholder="Enter Employee Phone" required value="<?= $res['phone'] ?>">
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="address" class="form-label">Address</label>
                     <input type="text" name="address" class="form-control" id="address"
                        placeholder="Enter Employee Address" required value="<?= $res['address'] ?>">
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="position" class="form-label">Position</label>
                     <input type="text" name="position" class="form-control" id="position"
                        placeholder="Enter Employee Position" required value="<?= $res['position'] ?>">
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="salary" class="form-label">Salary</label>
                     <input type="number" name="salary" class="form-control" id="salary"
                        placeholder="Enter Employee Salary" required value="<?= $res['salary'] ?>">
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="joindate" class="form-label">Join Date</label>
                     <input type="date" name="joindate" class="form-control" id="joindate"
                        placeholder="Enter Employee Join Of Date" required value="<?= $res['joindate'] ?>">
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="birthdate" class="form-label">Date Of Birth</label>
                     <input type="date" name="birthdate" class="form-control" id="birthdate"
                        placeholder="Enter Employee Date Of Birth" required value="<?= $res['birthdate'] ?>">
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="departments" class="form-label">Departments</label>
                     <select class="form-control" name="department_id" id="departments">
                        <?php
                        require("Included_Files/connection.php");
                        $depm_id = $res['department_id'];
                        $resultDepm = $connection->query("SELECT * FROM `departments` WHERE id = $depm_id");
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
                     <input <?php if ($res['gender'] == 'male') echo "checked"; ?> type="radio" name="gender" value="male" id="male" style="cursor: pointer">
                     <label for="male" style="cursor: pointer">Male</label>
                     <input <?php if ($res['gender'] == 'female') echo "checked"; ?> type="radio" name="gender" value="female" id="female" style="cursor: pointer">
                     <label for="female" style="cursor: pointer">Female</label>
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="status" class="form-label">Status : </label>
                     <br>
                     <input <?php if ($res['status'] == 'single') echo "checked"; ?> type="radio" name="status" value="single" id="single" style="cursor: pointer">
                     <label for="single" style="cursor: pointer">Single</label>
                     <input <?php if ($res['status'] == 'marrid') echo "checked"; ?> type="radio" name="status" value="marrid" id="marrid" style="cursor: pointer">
                     <label for="marrid" style="cursor: pointer">Marrid</label>
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="image" class="form-label">Choose Profile Image</label>
                     <input type="file" name="profileimg" class="form-control" id="image">
                  </div>
               </div>

            <?php } ?>


         </div>

         <button type="submit" class="btn btn-primary mt-4 w-100"> <i class="fa fa-edit"></i> Update</button>
      </form>

   </div>

   <script src="JS/bootstrap.js"></script>
   <script src="JS/main.js"></script>
</body>

</html>