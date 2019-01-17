<?php
  session_start();
  include 'includes/database.include.php';
  if(!isset($_SESSION['userName'])){
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/newProject.css" />

</head>
<body>
        <div id="id01" class="modal">
        <form class="modal-content" method="POST" action="includes/newproject.include.php">
            <div class="container">
              <h1>Add new Project</h1>

              <hr>

              <label class="labels" for="prjname"><b>Project Name</b></label>
              <input type="text" placeholder="Project Name" name="projectname" id="prjname" required>

              <!-- techno -->
            <h3>Add Technology</h3>
            <hr>

              <label class="labels" for="tech1"><b>Technology 1</b></label>
              <select name="technology1">
                <?php
                  $sql="SELECT * FROM technology";
                  $result=$conn->query($sql);

                  while ($row=$result->fetch_assoc()) {
                    echo "<option value=".$row['techname'].">".$row['techname']."</option>";
                  }
                 ?>
              </select>

              <label class="labels" for="tech2"><b>Technology 2</b></label>
              <select name="technology2">
                <?php
                  $sql="SELECT * FROM technology";
                  $result=$conn->query($sql);

                  while ($row=$result->fetch_assoc()) {
                    echo "<option value=".$row['techname'].">".$row['techname']."</option>";
                  }
                 ?>
              </select>

            <h3>Assign Team</h3>
              <hr>

            <!--  -->

                <!-- team -->
            <label class="labels" for="team1"><b>Team Member 1</b></label>
              <select name="team1">
                <?php
                  $sql="SELECT * FROM employee WHERE currentproject='no'";
                  $result=$conn->query($sql);

                  while ($row=$result->fetch_assoc()) {
                    echo "<option value=".$row['username'].">".$row['firstname']." ".$row['lastname']." - ".$row['role']."</option>";
                  }
                 ?>
              </select>

              <label class="labels" for="team2"><b>Team Member 2</b></label>
              <select name="team2">
                <?php
                  $sql="SELECT * FROM employee WHERE currentproject='no'";
                  $result=$conn->query($sql);

                  while ($row=$result->fetch_assoc()) {
                    echo "<option value=".$row['username'].">".$row['firstname']." ".$row['lastname']." - ".$row['role']."</option>";
                  }
                 ?>
              </select>

              <label class="labels" for="team3"><b>Team Member 3</b></label>
              <select name="team3">
                <?php
                  $sql="SELECT * FROM employee WHERE currentproject='no'";
                  $result=$conn->query($sql);

                  while ($row=$result->fetch_assoc()) {
                    echo "<option value=".$row['username'].">".$row['firstname']." ".$row['lastname']." - ".$row['role']."</option>";
                  }
                 ?>
              </select>



                <button type="submit" class="signupbtn">Create</button>


            </div>
          </form>
          </div>


</body>
</html>
