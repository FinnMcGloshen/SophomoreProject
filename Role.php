<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role
    </title>
</head>
<body>
    <div class="role">
        <header>Roles</header>
        <?php
        $var1 = 'Admin';
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query1 = 'DROP TABLE IF EXISTS roles;';
$query2 = 'CREATE TABLE roles (role1 text, accesslevel int);';
$query3 = "INSERT INTO roles(role1,accesslevel)
VALUES ('Admin',6),
('Supervisor',5),
('Doctor',4),
('Caregiver',3),
('Patient',2),
('Family Member',1);";
$query4 = 'SELECT * FROM roles;';
$result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
$result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
$result4 = pg_query($query4) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo pg_fieldname($result4,0);
echo pg_fieldname($result4,1);
echo "<table>\n";
while ($line = pg_fetch_array($result4, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result4);

// Closing connection
pg_close($dbconn);
?>
        <input type="text" class="role" placeholder="New Role"/>
        <br>
        <input type="text" class="accesslvl" placeholder="Access Level"/>
    </div>
</body>
</html>