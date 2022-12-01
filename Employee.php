<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee
    </title>
    <style>
        table,th,td{
            border:1px solid black
        }
    </style>
</head>
<body>
    <div class="employee">
        <header>Employee List</header>
        <?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query1 = 'DROP TABLE IF EXISTS employees;';
$query2 = 'CREATE TABLE employees (id int, name text, role text, salary int);';
$query3 = "INSERT INTO employees(id,name,role,salary)
VALUES (1,'John Smith', 'Admin', 120000),
(2,'Dan Miller', 'Supervisor', 100000),
(3,'Mary Lawrence', 'Supervisor', 100000),
(3,'Christine Philips', 'Doctor', 90000),
(3,'Jim Spencer', 'Doctor', 90000),
(3,'Wendy Harrington', 'Doctor', 90000),
(4,'Barbara Stevens', 'Caregiver', 80000),
(5,'Steve Johnson', 'Caregiver', 80000),
(6,'Craig Morgan', 'Caregiver', 80000),
(3,'Abby Watson', 'Caregiver', 80000);";
$query4 = 'SELECT * FROM employees;';
$result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
$result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
$result4 = pg_query($query4) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo pg_fieldname($result4,0).' '.pg_fieldname($result4,1);
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
        <!-- <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Role</td>
                <td>Salary</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table> -->
        <input type="text" class="empid" placeholder="Employee ID"/>
        <br>
        <input type="text" class="newsalary" placeholder="New Salary"/>
        <br>
        <button>OK</button>
        <br>
        <button>Cancel</button>
        
    </div>
</body>
</html>