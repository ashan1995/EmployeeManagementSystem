<?php
  session_start();
  include 'database.include.php';
  date_default_timezone_set("Asia/Colombo");

  $projectname=$_POST['projectname'];
  $technology1=$_POST['technology1'];
  $technology2=$_POST['technology2'];
  $teammember1=$_POST['team1'];
  $teammember2=$_POST['team2'];
  $teammember3=$_POST['team3'];

  $sql="SELECT projectname FROM project WHERE projectname='$projectname'";
  $result=$conn->query($sql);
  $userNameCheck=mysqli_num_rows($result);

  if($userNameCheck>0){
    header("Location: ../newProject.php?error=ProjectAlreadyExists");
    exit();
  }
  else{

  $sql="INSERT INTO project(projectname) VALUES ('$projectname')";
  $result=$conn->query($sql);

  $sql="SELECT projectid FROM project WHERE projectname='$projectname'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
  $projectid=$row['projectid'];

  $sql="SELECT techid FROM technology WHERE techname='$technology1'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
  $tech1id=$row['techid'];

  $sql="SELECT techid FROM technology WHERE techname='$technology2'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
  $tech2id=$row['techid'];

  $sql="INSERT INTO techbridge(techid,projectid) VALUES ('$tech1id',$projectid)";
  $result=$conn->query($sql);

  $sql="INSERT INTO techbridge(techid,projectid) VALUES ('$tech2id',$projectid)";
  $result=$conn->query($sql);

  $sql="UPDATE employee SET currentproject='$projectname' WHERE username='$teammember1'";
  $result=$conn->query($sql);

  $sql="UPDATE employee SET currentproject='$projectname' WHERE username='$teammember2'";
  $result=$conn->query($sql);

  $sql="UPDATE employee SET currentproject='$projectname' WHERE username='$teammember3'";
  $result=$conn->query($sql);

}

header("Location: ../Main.php");
