<?php
  session_start();
  include 'database.include.php';
  date_default_timezone_set("Asia/Colombo");
  $userName=$_POST['userName'];
  $password=$_POST['password'];
  $encriptedPassword=md5($password);

  $sql="SELECT * FROM employee WHERE username='$userName' AND password='$encriptedPassword'";
  $result=$conn->query($sql);

  if(!$row=$result->fetch_assoc()){
    $sql="SELECT * FROM pm WHERE username='$userName' AND password='$encriptedPassword'";
    $result=$conn->query($sql);

    if(!$row=$result->fetch_assoc()){
      echo "Your username or password is incorrect";
      header("Location: ../index.php?error=incorrectUsernameOrPassword");
    }else{
      $_SESSION['userName']=$userName;
      $_SESSION['role']='pm';
      header("Location: ../Main.php");
    }

  }else{
    $_SESSION['userName']=$userName;
    $_SESSION['role']='employee';
    header("Location: ../Main.php");
  }

  //header("Location: ../home.php");
