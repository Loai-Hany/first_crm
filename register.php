<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- FontAwesome Library -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <!-- Bootstrab -->
    <link rel="stylesheet" href="CSS/bootstrap.css">
   <!-- Main CSS File -->
   <link rel="stylesheet" href="CSS/main.css">
</head>
<body style="background-color: #ccc">

<form class="w-25 mx-auto" action="insertuser.php" method="POST" enctype="multipart/form-data">
    <h2 class="mt-5 text-center text-primary">Register New Account</h2>

            <div class="row mt-5 p-4" style="background-color: #e2e2e2; border: 2px solid #9e9e9e; border-radius: 6px; box-shadow: 0 0 10px #9e9e9e;">

            <div class="col-md-12">
                     <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="username" class="form-control" id="name"
                         placeholder="Enter Your Name" autofocus required>
                     </div>
                </div>

                
             <div class="col-md-12">
                <div class="mb-3">
                  <label for="myimg" class="form-label">Choose Profile Image</label>
                    <input type="file" name="image" class="form-control" id="myimg">
                </div>
             </div>

                <div class="col-md-12">
                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                         placeholder="Enter Your Email" autofocus required>
                     </div>
                </div>
                
                      
             <div class="col-md-12">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" 
                    placeholder="Enter Your Password" required>
                </div>
             </div>


             <input type="submit" class="btn btn-primary w-100" value="Register">

        </div>

</form>

      <?php  
         session_start();
         if(isset($_SESSION["emailExisted"]) && $_SESSION["emailExisted"] != "" ) { ?>
          <div class="alert alert-danger text-center mx-auto my-5 fs-5 w-50">
             <?= $_SESSION["emailExisted"] ?>
          </div>
      <?php } ?>

  <script src="JS/bootstrap.js"></script>
  <script src="JS/main.js"></script>
    
</body>
</html>

<?php $_SESSION["emailExisted"] = "" ?>