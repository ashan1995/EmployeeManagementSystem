<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SignUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/Signup.css" />
    
</head>
<body>
        <div id="id01" class="modal">
        <form class="modal-content" action="/action_page.php">
            <div class="container">
              <h1>Sign Up</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>
              
              <label class="labels" for="fName"><b>First Name</b></label>
              <input type="text" placeholder="First Name" name="firstName" id="fName" required>

              <label class="labels" for="lName"><b>Last Name</b></label>
              <input type="text" placeholder="Last Name" name="lastName" id="lName" required>

              <label class="labels" for="username"><b>Username</b></label>
              <input type="text" placeholder="Username" name="username" id="username" required>

              <label class="labels" for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" id="email" required>
        
              <label class="labels" for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" id="psw" required>
        
              <label class="labels" for="psw-repeat"><b>Repeat Password</b></label>
              <input type="password" placeholder="Repeat Password" name="rePasswordt" id="psw-repeat" required>

              <label class="labels" for="email"><b>Department</b></label>
              <select name="department">
                  <option value="dev">Developer</option>
                  <option value="qa">Quality Assurance</option>
                  <option value="ba">Buisness Analysts</option>
              </select>

              <input type="hidden" id="sel">
            <!--tech select-->
                <div id="techs">
                    <label class="labels" for="technm"><b>Technologies</b></label>
                    <select multiple name="technm" >
                    </select>
                </div>

             
              <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
        
            
                <button type="submit" class="signupbtn">Sign Up</button>
            
            </div>
          </form>
          </div>

    
</body>
</html>