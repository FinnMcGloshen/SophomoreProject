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
  <div class="choices" id="input-fields">
      <select name="role" id="Role-Type" onchange="toggleDiv(this.value)">
        <option value="">Select an Option:</option>
        <option value="2">Admin</option>
        <option value="2">Supervisor</option>
        <option value="2">Caregiver</option>
        <option value="2">Doctor</option>
        <option value="2">Family Member</option>
        <option value="1">Patient</option>
      </select>
    </div>
    <div class="New-Roster-Div" id="Form-1">
      <h2><center>Create an Account:</center></h2>
      <form action="" method="POST">
      <div class="input-fields">
        <div class="New-Roster-Section-1">
          <div class="Section-1-Style">
            <h3>First Name:</h3>
            <br />
            <div class="username">
              <input
                type="first-name"
                class="firstname-input"
                placeholder="First Name"
                name="fname"
                required
              />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>Last Name:</h3>
            <br />
            <div class="username">
              <input
                type="last-name"
                class="lastname-input"
                placeholder="Last Name"
                name="lname"
                required
              />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>Email ID:</h3>
            <br />
            <div class="username">
              <input
                type="email"
                class="user-input"
                placeholder="Email Address"
                name="email"
                required
              />
            </div>
          </div>
        </div>
        <div class="New-Roster-Section-1">
          <div class="Section-1-Style">
            <h3>Phone #:</h3>
            <br />
            <div class="username">
              <input
                type="tel"
                placeholder="Phone #"
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                required
                name="phone"
              />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>Password:</h3>
            <br />
            <div class="username">
              <input
                type="password"
                class="pass-input"
                placeholder="Password"
                name="password"
                required
              />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>Date of Birth:</h3>
            <br />
            <div class="username">
              <input
                type="date"
                class="user-input"
                placeholder="Date Of Birth"
                name="dob"
                required
              />
            </div>
          </div>
        </div>
        <div class="New-Roster-Section-1">
          <div class="Section-1-Style">
            <h3>Family Code:</h3>
            <br />
            <div class="username">
              <input type="number" name="familyCode" placeholder="Ex: 12345" />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>EM Contact:</h3>
            <br />
            <div class="username">
              <input
                type="text"
                placeholder="Emergency Contact"
                name="emergencyContact"
              />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>Relation to Emergency Contact:</h3>
            <br />
            <div class="username">
              <select name="Roles" id="Roles-9" class="Doctor-Selection">
                <option value="" class="Family">Select a choice</option>
                <option value="" class="Family">Father</option>
                <option value="" class="Family">Mother</option>
                <option value="" class="Family">Brother</option>
                <option value="" class="Family">Sister</option>
                <option value="" class="Family">Aunt</option>
                <option value="" class="Family">Uncle</option>
                <option value="" class="Family">Grandmother</option>
                <option value="" class="Family">Grandfather</option>
              </select>
            </div>
          </div>
        </div>
        <div class="New-Roster-Section-2">
          <div class="Section-2-Style">
            <h3>Date:</h3>
            <br />
            <div class="username">
              <input type="date" name="admissionDate" />
            </div>
          </div>
        </div>
      </div>
      <br />
      <div class="link-2">
        Already have an account? <a href="Login.php">Sign-In Here!</a>
      </div>
      <br />
      <center><input class="signin-btn" type="submit" value="submit" name="signup" ></input></center>
    </form>
    </div>
    <br />
    <div class="New-Roster-Div-2" id="Form-2">
      <h2><center>Create an Account:</center></h2>
      <form action="" method="POST">
      <div class="input-fields">
        <div class="New-Roster-Section-1">
          <div class="Section-1-Style">
            <h3>First Name:</h3>
            <br />
            <div class="username">
              <input  type="first-name"
              class="firstname-input"
              placeholder="First Name"
              name="fname"
              required />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>Last Name:</h3>
            <br />
            <div class="username">
              <input type="last-name"
              class="lastname-input"
              placeholder="Last Name"
              name="lname"
              required />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>Email ID:</h3>
            <br />
            <div class="username">
              <input
              type="email"
              class="user-input"
              placeholder="Email Address"
              name="email"
              required
              />
            </div>
          </div>
        </div>
        <br />
        <div class="New-Roster-Section-1">
          <div class="Section-1-Style">
            <h3>Phone #:</h3>
            <br />
            <div class="username">
              <input
              type="tel"
              placeholder="Phone #"
              pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
              required
              name="phone"
              />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>Password:</h3>
            <br />
            <div class="username">
              <input
              type="password"
              class="pass-input"
              placeholder="Password"
              name="password"
              required
              />
            </div>
          </div>
          <div class="Section-1-Style">
            <h3>Date of Birth:</h3>
            <br />
            <div class="username">
              <input  type="date"
              class="user-input"
              placeholder="Date Of Birth"
              name="dob"
              required />
            </div>
          </div>
        </div>
      </div>
      <br />
      <div class="link">
        Already have an account? <a href="Login.php">Sign-In Here!</a>
      </div>
      <br />
      <center><input class="signin-btn" type="submit" value="submit" name="signup" ></input></center>
      </form>
      <br>
      <br>
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
      function toggleDiv(value){
            if (value == ""){
                alert("Please select an option!");
                const Form1 = document.getElementById("Form-1");

              Form1.style.display = value == 1 ? "block" : "none";

            }
            const Form1 = document.getElementById("Form-1");

            Form1.style.display = value == 1 ? "block" : "none";

            const Form2 = document.getElementById("Form-2");

            Form2.style.display = value == 2 ? "block" : "none";
        }
    </script>
  </body>
</html>
