<?php
  session_start();
  include 'database.include.php';

  date_default_timezone_set("Asia/Colombo");

  $projectname=$_POST['projectname'];


    $sql="UPDATE project SET completed='yes' WHERE projectname='$projectname'";
    $result=$conn->query($sql);

    $sql="UPDATE employee SET currentproject='no' WHERE currentproject='$projectname'";
    $result=$conn->query($sql);


    header("Location: ../Main.php");
