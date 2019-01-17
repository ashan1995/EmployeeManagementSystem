<?php
  session_start();
  include '../database.php';
  date_default_timezone_set("Asia/Colombo");
  $userName=$_POST['userName'];
  $password=$_POST['password'];

  $sql="SELECT * FROM user WHERE userName='$userName' AND password='$password'";
  $result=$conn->query($sql);

  if(!$row=$result->fetch_assoc()){
    echo "Your username or password is incorrect";
  }else{
    $_SESSION['userId']=$row['userId'];
  }

  header("Location: ../home.php");
