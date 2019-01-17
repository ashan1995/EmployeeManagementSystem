<?php
  session_start();
  include 'includes/database.include.php';
  if(isset($_SESSION['userName'])){
    header("Location: Main.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/Login.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Bootsrap/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div class="row">
                <div class="col-md-7 custom-left">
                        <h1 id="topic">Virtual Project Manager</h1>
                </div>
                <div class="col-md-5 custom-right">
                          <div class="loginbox">
                                    <form class="modal-content loginform" method="POST" action="includes/login.include.php">
                                        <label class="labels" for="Username"><b>User Name</b></label>
                                        <input type="text" placeholder="Username" name="userName" required>

                                        <label class="labels" for="password"><b>Password</b></label>
                                        <input type="password" placeholder="Password" name="password" required>

                                        <button>Sign In</button>
                                    </form>
                                    <div class="modal-content signupbox">
                                       <p> New Project Manager? <a href="PMSignup.php">Create an Account</a></p>
                                       <p> New Employee? <a href="EmpSignup.php">Create an Account</a></p>
                                    </div>
                           </div>

                </div>
        </div>

    </div>
</body>
</html>
