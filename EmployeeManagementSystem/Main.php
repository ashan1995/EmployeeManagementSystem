<?php
  session_start();
  include 'includes/database.include.php';
  if(!isset($_SESSION['userName'])){
    header("Location: index.php");
  }
  $username=$_SESSION['userName'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css" />
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/emppanel.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row logopanel">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <img id="logo" src="Assets/justASK.png" alt="">
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12"></div>

            <div class="col-md-4 col-sm-4 col-xs-12 signout-panel">
                <h2 class="greet">
                  <?php

                    if($_SESSION['role']=="employee"){
                      $sql="SELECT firstname FROM employee WHERE username='$username'";
                      $result=$conn->query($sql);
                      $row=$result->fetch_assoc();
                      $firstname=$row['firstname'];
                    }
                    else if($_SESSION['role']=="pm"){
                      $sql="SELECT firstname FROM pm WHERE username='$username'";
                      $result=$conn->query($sql);
                      $row=$result->fetch_assoc();
                      $firstname=$row['firstname'];
                    }

                    echo "Hi ".$firstname;

                   ?>
                </h2>
                <form action="includes/logout.include.php">
                    <button class="custom-logout">LogOut</button>
                </form>
            </div>

        </div>

        <?php

      if ($_SESSION['role']=="employee") {
        $sql="SELECT currentproject FROM employee WHERE username='$username'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        if ($row['currentproject']=='no') {
          $currentproject='Not Assigned';
        }
        else{
          $currentproject=$row['currentproject'];
        }

        echo
        "<div>
            <div class='row'>
            <div class='assigned'>
                <h3>Assigned Projects</h3>
                <p>$currentproject </p>
            </div>
            </div>
            <div class='row'>
            <div class='completed'>
                <h3>Completed Projects</h3>
            </div>
            </div>
        </div>";

      }
      else if ($_SESSION['role']=="pm"){
        echo
        "<div>
        <form action='newProject.php'>
            <button type='submit' class='btn btn-primary' name='button'>Create New Project</button>
            </form>
            <div class='jumbotron'>

                    <h3>Ongoing Projects</h3>
                </div>
                <div class='row'>
                    <div class='project-list'>";

                        $sql="SELECT projectname FROM project WHERE completed='no'";
                        $result=$conn->query($sql);

                        while ($row=$result->fetch_assoc()) {
                          $projectname=$row['projectname'];
                          echo "<form method='POST' action='includes/deleteproject.include.php'><p>".$projectname."</p>

                            

                          <input type='hidden'  name='projectname' value='$projectname'>
                          <button  type='submit' class='btn btn-danger pull-right btn-sm'> Close</button></form>";

                        }
                      echo "
                    </div>


                </div>
        </div>
        <div>
            <div class='jumbotron'>
                    <h3>Completed Projects</h3>
                </div>
                <div class='row'>
                    <div class='project-list'>";

                        $sql="SELECT projectname FROM project WHERE completed='yes'";
                        $result=$conn->query($sql);

                        while ($row=$result->fetch_assoc()) {
                          $projectname=$row['projectname'];
                          echo "<p>".$projectname."</p>";

                        }
                      echo "
                    </div>


                </div>
        </div>
        </div>";
      }


    ?>

</body>
</html>
