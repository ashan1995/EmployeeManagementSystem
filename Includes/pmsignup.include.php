<?php
  session_start();
  include 'database.include.php';

  date_default_timezone_set("Asia/Colombo");

  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $userName=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $passwordRepeat=$_POST['passwordRepeat'];

  if($password!=$passwordRepeat){
    header("Location: ../EmpSignup.php?error=password");
  }
  else{
    $sql="SELECT username FROM employee WHERE username='$userName'";
    $result=$conn->query($sql);
    $userNameCheck=mysqli_num_rows($result);

    $sql2="SELECT username FROM pm WHERE username='$userName'";
    $result2=$conn->query($sql);
    $userNameCheck2=mysqli_num_rows($result2);

    if($userNameCheck>0 || $userNameCheck2>0){
      header("Location: ../PMSignup.php?error=UsernameAlreadyExists");
      exit();
    }
    else{
      $encriptedPassword=md5($password);
      $sql="INSERT INTO pm(firstname,lastname,username,email,password)
            VALUES('$firstName','$lastName','$userName','$email','$encriptedPassword')";
      $result=$conn->query($sql);


      //echo("Error description: " . mysqli_error($conn));


      header("Location: ../index.php");
    }
  }
