<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role
    </title>
    
    <link rel="stylesheet" href="Role.css" />
</head>
<body>
<div class="Btn-Fix">
      <button onclick="history.go(-1);" class="Redirect-Home"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
      </svg>Go Back</a></button>
    </div>
        <div class="Welcome-Greeting-1"><h2>Millstream Village Role List:</h2></div>
    <div class="Main-Table">
      <table>
        <tbody>
          <tr class="table-title">
            <th class="table-data">Role</th>
            <th class="table-data">Access Level</th>
          </tr>
        <?php
        $var1 = 'Admin';
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
// $query1 = 'DROP TABLE IF EXISTS roles;';
// $query2 = 'CREATE TABLE roles (role1 text, accesslevel int);';
// $query3 = "INSERT INTO roles(role1,accesslevel)
// VALUES ('Admin',6),
// ('Supervisor',5),
// ('Doctor',4),
// ('Caregiver',3),
// ('Patient',2),
// ('Family Member',1);";
$query4 = 'SELECT * FROM roles ORDER BY accesslevel desc;';
// $result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
// $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
// $result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
$result4 = pg_query($query4) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result4, null, PGSQL_ASSOC)) {
    echo "\t<tr class='table-title'>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td class='table-data'>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

if(isset($_POST['insert'])&&!empty($_POST['insert'])){
  $newrole = $_POST['newrole'];
  $accesslvl = $_POST['accesslvl'];
  $sql = "INSERT INTO roles (role1,accesslevel)
  VALUES ('$newrole','$accesslvl');";
  $result = pg_query($sql) or die('Query failed: ' . pg_last_error());
  header("Refresh:0");
  // if($result){
  //   echo "data is inserted: $result\n";
  // } else{
  //   echo "insert failed";
  }
// }

if(isset($_POST['delete'])&&!empty($_POST['delete'])){
  $newrole = $_POST['newrole'];
  $accesslvl = $_POST['accesslvl'];
  $sql = "DELETE FROM roles WHERE role1 = '$newrole';";
  $result = pg_query($sql) or die('Query failed: ' . pg_last_error());
  header("Refresh:0");
  // if($result){
  //   echo "data is inserted: $result\n";
  // } else{
  //   echo "insert failed";
  }
// }

// Free resultset
pg_free_result($result4);

// Closing connection
pg_close($dbconn);
?>
<div class="newrole">
  <form method="POST">
        <input type="text" class="role" placeholder="New Role" name="newrole"/>
        <br>
        <input type="text" class="accesslvl" placeholder="Access Level" name="accesslvl"/>
        <br>
</div>
<div class="newrole">
        <input class="Btn-Style-1" type="submit" name="insert" value="Insert"></input>
        <br>
        <input class="Btn-Style-1" type="submit" name="delete" value="Delete"></input>
        </form>
    </div>
</body>
</html>