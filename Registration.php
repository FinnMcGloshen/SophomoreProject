<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="Registration.css" /> -->
    <title>Registration</title>
  </head>
  <body>
    <div class="sign-in-div">
      <div class="title">Create an Account</div>
      <br>
      <form action="" method="POST">
        <div class="input-fields-1">
          <div class="first-name">
            <input
              name = "firstName"
              type="first-name"
              class="firstname-input"
              placeholder="First Name"
            />
          </div>
          <div class="last-name">
            <input
              type="last-name"
              class="lastname-input"
              placeholder="Last Name"
            />
          </div>
        </div>
        <div class="input-fields-2">
          <div class="email">
            <input type="email" class="user-input" placeholder="Email Address" />
          </div>
          <div class="roles">
            <select name="roles" id="Role-Type">
              <option value="">Select a role</option>
              <option value="Admin">Admin</option>
              <option value="Supervisor">Supervisor</option>
              <option value="">Caregiver</option>
              <option value="">Doctor</option>
              <option value="">Family Member</option>
              <option value="">Patient</option>
            </select>
          </div>
          <div class="phone">
            <input
              type="tel"
              placeholder="Phone #"
              pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
            />
          </div>
          <div class="password">
            <input type="password" class="pass-input" placeholder="Password" />
          </div>
          <div class="dob">
            <input type="date" class="user-input" placeholder="Date Of Birth" />
          </div>
        </div>
        <center><button type="submit" class="signin-btn">Sign Up</button></center>
      </form>
      <?php
        $role = $_POST['Roles'];
        $firstName = $_POST['firstName'];
        if(isset($_POST['firstName'])){
          echo $firstName;
        }
        if (isset($_POST['Roles'])){
          echo $role;
        }
      ?>
      
      <div class="link">
        Already have an account? <a href="Login.html">Sign-In Here!</a>
      </div>
    </div>
  </body>
</html>

