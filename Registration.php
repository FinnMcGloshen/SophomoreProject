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
  </head>
    <?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=aaronwork user=aaronwork password=gamecube")
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
    // form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $familyCode = intval($_POST['familyCode']);
    $emergencyContact = $_POST['emergencyContact'];
    $relation = $_POST['relation'];
    $admissionDate = $_POST['admissionDate'];
    // $fields = implode (" , ", $fields);
    // $query1 = 'DROP TABLE IF EXISTS accounts;';
    // $query2 = 'CREATE TABLE accounts (fname text, lname text, email text, role text, phone text, password text, dob date);';
    $query3 = "INSERT INTO accounts(fname,lname,email,role,phone,password,dob, family_code, emcontact, relation, admission_date, group_letter)
    VALUES ('$fname','$lname','$email','$role','$phone','$password','$dob', NULL, NULL, NULL, NULL, NULL);";
    $additionalQuery = "INSERT INTO accounts(fname,lname,email,role,phone,password,dob, family_code, emcontact, relation, admission_date, group_letter)
    VALUES ('$fname','$lname','$email','$role','$phone','$password','$dob',$familyCode,'$emergencyContact','$relation','$admissionDate',NULL);";
    // $query4 = 'SELECT * FROM accounts;';
    // $result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
    // $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
    if($role == 'Patient'){
      $result3 = pg_query($additionalQuery) or die('Query failed: ' . pg_last_error());
    } else {
      $result = pg_query($query3) or die('Query failed: ' . pg_last_error());
    }
    echo 'Account created!';
    header('location: Login.php');
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
            <option value="Admin">Admin</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Caregiver">Caregiver</option>
            <option value="Doctor">Doctor</option>
            <option value="Patient">Patient</option>
            <option value="Family Member">Family Member</option>
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
        <div class="additionalInfo" id="additionalInfo">
          <div class="familyCode">
            Family Code<input type="number" placeholder="Family Code" name="familyCode">
          </div>
          <div class="emergencyContact">
            EM Contact<input type="text" placeholder="Emergency Contact" name="emergencyContact">
          </div>
          <div class="relation">
            Relation<input type="text" placeholder="Relation to Contact" name="relation">
          </div>
          <div class="admissionDate">
            Admission Date<input type="date" name="admissionDate">
          </div>
        </div>
      </div>
      <center><input class="signin-btn" type="submit" value="submit" name="signup" >Sign Up</input></center>
      </form>

      <div class="link">
        Already have an account? <a href="Login.php">Sign-In Here!</a>
      </div>
    </div>
    <script>
      var patientDiv = document.getElementById('additionalInfo');
      var selectval = document.getElementById('Role-Type');
      patientDiv.style.display = 'none'
      if(selectval != null){
        selectval.addEventListener("change", function() {
          if (selectval.value == "Patient"){
            patientDiv.style.display = 'block'
            console.log(selectval.value);
          } else {
            patientDiv.style.display = 'none'
          }
        });
      }
    </script>
  </body>
</html>
