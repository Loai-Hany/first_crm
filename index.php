<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- FontAwesome Library -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <!-- Bootstrab -->
    <link rel="stylesheet" href="CSS/bootstrap.css">
   <!-- Main CSS File -->
   <link rel="stylesheet" href="CSS/main.css">
</head>
<body style="background-color: #ccc">

<form class="w-25 mx-auto" action="checkuser.php" method="POST" enctype="multipart/form-data">
    <h2 class="mt-5 text-center text-primary">Enter Your Valid Account</h2>

            <div class="row mt-5 p-4" style="background-color: #e2e2e2; border: 2px solid #9e9e9e; border-radius: 6px; box-shadow: 0 0 10px #9e9e9e;">

                <div class="col-md-12">
                     <div class="mb-3" style="position: relative;">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                         placeholder="Enter Your Email" autofocus required >
                         <i class="fas fa-envelope" style="position: absolute; top: 42px; right: 12px; color: #666"></i>
                     </div>
                </div>
                
                      
             <div class="col-md-12">
                <div class="mb-3" style="position: relative;">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" 
                    placeholder="Enter Your Password" required>
                    <i class="fa fa-eye" id="showPassword" style="position: absolute; top: 42px; right: 12px; color: #666; cursor:pointer;"></i>
                    <script>
                        var password = document.getElementById("password");
                        var showPassword = document.getElementById("showPassword");
                        showPassword.addEventListener("click", function() {
                            if(password.type == "password")  {
                                password.type = "text";
                            } else {
                                password.type = "password";
                            }
                        });
                    </script>
                </div>
             </div>

             <input type="submit" class="btn btn-primary w-100" value="Login">
             <p class="mt-3 text-danger">If You Don't Have An Account Yet Can Create On From Here</p>
             <a href="register.php">Create New Account Now</a>

        </div>

</form>

    <?php 
    session_start();
    if(isset($_SESSION['errorMessage'])) { 
    ?>

        <div class="alert alert-danger mx-auto my-5 w-50 text-center fs-5">
            <?= $_SESSION['errorMessage'] ?>
        </div>

    <?php  } ?>

  <script src="JS/bootstrap.js"></script>
  <script src="JS/main.js"></script>
    
</body>
</html>

<?php  session_destroy(); ?>