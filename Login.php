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
    <link rel="stylesheet" href="Login.css" />
    <title>Login</title>
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
if(isset($_POST['submit'])&&!empty($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashpassword = md5($_POST['password']);
  $sql ="select * from accounts where email = '".pg_escape_string($_POST['email'])."' and password ='".$password."'";
  $data = pg_query($dbconn,$sql); 
  $login_check = pg_num_rows($data);
  if($login_check > 0){ 
    
    // echo "Login Successfully";    
    // $query1 ="select role from accounts where email = '".pg_escape_string($_POST['email'])."' and password ='".$password."'";
    // $result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
    // $query = "SELECT * FROM accounts WHERE email='$email' AND password ='$password'";
    $sql = "SELECT * FROM accounts WHERE email='$email' AND password ='$password'";
    $result = pg_query($dbconn, $sql);
    $row = pg_fetch_assoc($result);
    if($row["role"]=='Admin'){
      header('location: Admin-Report.html');
    }
    if($row["role"]=='Supervisor'){
      header('location: roster.php');
    }
    if($row["role"]=='Caregiver'){
      header("location: Caregiver's-Home.php");
    }
    if($row["role"]=='Doctor'){
      header("location: Doctor's-Home.html");
    }
    if($row["role"]=='Patient'){
      header('location: Patient-Additional_Info.php');
    }
    if($row["role"]=='Family Member'){
      header("location: Family-Member-Home.html");
    }
}else{
    
    echo "Invalid Details";
}
}

pg_close($dbconn);
?>
  </head>
  <body>
    <div class="login-div">
      <div class="title">Millstream Village Login</div>
      <div class="input-fields">
        <div class="username">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="25"
            height="16"
            fill="currentColor"
            class="bi bi-envelope"
            viewBox="0 0 16 16"
          >
            <path
              d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"
            />
          </svg>
          <form method="POST">
          <input type="email" class="email-input" placeholder="Email" name="email" />
        </div>
        <div class="password">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="25"
            height="16"
            fill="currentColor"
            class="bi bi-lock"
            viewBox="0 0 16 16"
          >
            <path
              d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"
            />
          </svg>
          <input type="password" class="pass-input" placeholder="Password" name="password"/>
        </div>
      </div>
      <center><input class="signin-btn" name="submit" type="submit" value="submit"></center>
      </form>
      <br>
      <div class="link">
        Don't have an account? <a href="Registration.php">Register Here!</a>
      </div>
    </div>
  </body>
</html>
