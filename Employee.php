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
        <header>Patient's Home</header>
        <?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT * FROM table1';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

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