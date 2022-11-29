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
    <link rel="stylesheet" href="Registration.css" />
    <title>Registration</title>
    <?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$fields = array('fname','lname','email','role','phone','password','dob');

// $values = '';
//     foreach ($fields as $field) {
//         if (!empty($_POST[$field])){
//                 $dbValues[] = "'".pg_cleanse($_POST[$field])."'";
//         } else {
//                 $dbValues[] = ' null ';
//         }
//     }

  if(isset($_POST['signup'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    // $fields = implode (" , ", $fields);
    // $query1 = 'DROP TABLE IF EXISTS accounts;';
    // $query2 = 'CREATE TABLE accounts (fname text, lname text, email text, role text, phone text, password text, dob date);';
    $query3 = "INSERT INTO accounts(fname,lname,email,role,phone,password,dob)
    VALUES ('$fname','$lname','$email','$role','$phone','$password','$dob');";
    // $query4 = 'SELECT * FROM accounts;';
    
    // $result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
    // $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
    $result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
    echo 'Account created!';
    header('location: login.php');
  }
// $result4 = pg_query($query4) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
// echo pg_fieldname($result4,0).' '.pg_fieldname($result4,1);
// echo "<table>\n";
// while ($line = pg_fetch_array($result4, null, PGSQL_ASSOC)) {
//     echo "\t<tr>\n";
//     foreach ($line as $col_value) {
//         echo "\t\t<td>$col_value</td>\n";
//     }
//     echo "\t</tr>\n";
// }
// echo "</table>\n";
// function pg_cleanse($value){
//   if (is_string($value)){
//       return pg_escape_string(trim($value));
//   }
//   if (is_null($value)) {
//       return null;
//   }
//   return $value;
// }
// Free resultset
// pg_free_result($result4);

// Closing connection
pg_close($dbconn);
?>
  </head>
  <body>
    <div class="sign-in-div">
      <div class="title">Create an Account</div>
      <br>
      <form action="" method="POST">
      <div class="input-fields-1">
        <div class="first-name">
          <input
            type="first-name"
            class="firstname-input"
            placeholder="First Name"
            name="fname"
          />
        </div>
        <div class="last-name">
          <input
            type="last-name"
            class="lastname-input"
            placeholder="Last Name"
            name="lname"
          />
        </div>
      </div>
      <div class="input-fields-2">
        <div class="email">
          <input type="email" class="user-input" placeholder="Email Address" name="email" />
        </div>
        <div class="roles">
          <select name="role" id="Role-Type">
            <option value="">Select a role</option>
            <option value="6">Admin</option>
            <option value="5">Supervisor</option>
            <option value="4">Caregiver</option>
            <option value="3">Doctor</option>
            <option value="2">Patient</option>
            <option value="1">Family Member</option>
          </select>
        </div>
        <div class="phone">
          <input
            type="tel"
            placeholder="Phone #"
            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
            required
            name="phone"
          />
        </div>
        <div class="password">
          <input type="password" class="pass-input" placeholder="Password" name="password"/>
        </div>
        <div class="dob">
          <input type="date" class="user-input" placeholder="Date Of Birth" name="dob"/>
        </div>
      </div>
      <center><input class="signin-btn" type="submit" value="submit" name="signup" >Sign Up</input></center>
      </form>
      <div class="link">
        Already have an account? <a href="Login.php">Sign-In Here!</a>
      </div>
    </div>
  </body>
</html>
