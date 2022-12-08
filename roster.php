<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roster
    </title>
    <link
    href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap"
    rel="stylesheet"
  />
    <link rel="stylesheet" href="Roster.css">
    <style>
        table,th,td{
            border:1px solid black
        }
    </style>
</head>
<body>
<div class="Btn-Fix">
      <button onclick="history.go(-1);" class="Redirect-Home"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
      </svg>Go Back</a></button>
    </div>
    <div class="roster">
    <h2 class="Welcome-Greeting-1">
      Welcome to the Millstream Village Roster!
    </h2>
    <br />
    <h2 class="Welcome-Greeting-2">Current Roster:</h2>
    <br>
        <h2 class="Welcome-Greeting-2">Date: <?php echo date("Y-m-d")?></h2>
        <br>
        <div class="Main-Table">
        <table>
          <tbody>
            <tr class="table-title">
              <th class="table-data">Supervisor</th>
              <th class="table-data">Doctor</th>
              <th class="table-data">Caregiver #1</th>
              <th class="table-data">Caregiver #2</th>
              <th class="table-data">Caregiver #3</th>
              <th class="table-data">Caregiver #4</th>
            </tr>
    </div>
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
    // echo "<table>\n";
    while ($line = pg_fetch_array($result4, null, PGSQL_ASSOC)) {
        echo "\t<tr class='table-title'>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td  class='table-data'>$col_value</td>\n";
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