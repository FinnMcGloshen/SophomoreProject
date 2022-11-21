<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roster
    </title>
    <style>
        table,th,td{
            border:1px solid black
        }
    </style>
</head>
<body>
    <div class="roster">
        <header>Roster</header>
        <p>Date: <?php echo date("Y-m-d")?></p>
        <?php 
        $dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
        or die('Could not connect: ' . pg_last_error());
    
    // Performing SQL query
    $query1 = 'DROP TABLE IF EXISTS roster;';
    $query2 = 'CREATE TABLE roster (supervisor text, doctor text, cg1 text, cg2 text, cg3 text, cg4 text);';
    $query3 = "INSERT INTO roster(supervisor,doctor,cg1,cg2,cg3,cg4)
    VALUES ('Dan Miller', 'Christine Philips', 'Barbara Stevens', 'Steve Johnson', 'Craig Morgan', 'Abby Watson' ),
    (NULL, NULL, 'Patient Group A', 'Patient Group B', 'Patient Group C', 'Patient Group D' );";
    $query4 = 'SELECT * FROM roster;';
    $result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
    $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
    $result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
    $result4 = pg_query($query4) or die('Query failed: ' . pg_last_error());
    
    // Printing results in HTML
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
    </div>
</body>
</html>
</html>