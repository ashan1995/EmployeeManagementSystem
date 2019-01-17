<?php
  session_start();
  include 'database.include.php';

  date_default_timezone_set("Asia/Colombo");

  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $userName=$_POST['userName'];
  $email=$_POST['email'];
  $department=$_POST['department'];
  $role=$_POST['role'];
  $password=$_POST['password'];
  $passwordRepeat=$_POST['passwordRepeat'];

  if($password!=$passwordRepeat){
    header("Location: ../EmpSignup.php?error=password");
  }
  else{
    $sql="SELECT username FROM employee WHERE username='$userName'";
    $result=$conn->query($sql);
    $userNameCheck=mysqli_num_rows($result);

    if($userNameCheck>0){
      header("Location: ../EmpSignup.php?error=UsernameAlreadyExists");
      exit();
    }
    else{
      $encriptedPassword=md5($password);
      $sql="INSERT INTO employee(firstName,lastName,username,email,department,Role,password)
            VALUES('$firstName','$lastName','$userName','$email','$department','$role','$encriptedPassword')";
      $result=$conn->query($sql);
      

      //echo("Error description: " . mysqli_error($conn));


      header("Location: ../index.php");
    }
  }
