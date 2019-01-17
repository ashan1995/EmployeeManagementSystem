<?php
  session_start();
  include 'database.include.php';


  $projectname=$_POST['projectname'];
  $tech1=$_POST['technology1'];
  $tech2=$_POST['technology1'];
//   $team1=$_POST['team1'];
//   $team2=$_POST['team2'];
//   $team3=$_POST['team3'];
  
  $sql="INSERT INTO project(projectname) VALUES('$projectname')";
    $result=$conn->query($sql);

    $sql="SELECT techid FROM technology WHERE techname='$tech1'";
    $result=$conn->query($sql);
    $tech1id=mysqli_num_rows($result);

    $sql="SELECT techid FROM technology WHERE techname='$tech2'";
    $result=$conn->query($sql);
    $tech2id=mysqli_num_rows($result);


    $sql="SELECT projectid FROM project WHERE projectname='$projectname'";
    $result=$conn->query($sql);
    $projectid=mysqli_num_rows($result);



    $sql="INSERT INTO techbridge(projectid,techid) VALUES('$projectid','$tech1')";
    $result=$conn->query($sql);

    $sql="INSERT INTO techbridge(projectid,techid) VALUES('$projectid','$tech2')";
    $result=$conn->query($sql);

   

    
    

   