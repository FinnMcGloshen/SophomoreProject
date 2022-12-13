<?php 

    $dbconn = pg_connect("host=localhost dbname=aaronwork user=aaronwork password=gamecube")
    or die('Could not connect: ' . pg_last_error());
    
    // Performing SQL query
    // $query1 = 'DROP TABLE IF EXISTS roster;';
    // $query2 = 'CREATE TABLE roster (roster_date date, datesupervisor text, doctor text, cg1 text, cg2 text, cg3 text, cg4 text);';
    // $query3 = "INSERT INTO roster(supervisor,doctor,cg1,cg2,cg3,cg4)
    // VALUES ('Dan Miller', 'Christine Philips', 'Barbara Stevens', 'Steve Johnson', 'Craig Morgan', 'Abby Watson' ),
    // (NULL, NULL, 'Patient Group A', 'Patient Group B', 'Patient Group C', 'Patient Group D' );";
    $query4 = "SELECT * FROM roster;";
    // $result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
    // $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
    // $result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
    $result4 = pg_query($dbconn, $query4) or die('Query failed: ' . pg_last_error());
    $myObj = array();
    // Printing results in HTML
    // echo "<table>\n";
    while ($row = pg_fetch_array($result4)){
        $myObj[$row['roster_date']] = array(
            'supervisor' => $row['supervisor'],
            'doctor' => $row['doctor'],
            'cg1' => $row['cg1'],
            'cg2' => $row['cg2'],
            'cg3' => $row['cg3'],
            'cg4' => $row['cg4'],
            'cg1_group' => $row['cg1_group'],
            'cg2_group' => $row['cg2_group'],
            'cg3_group' => $row['cg3_group'],
            'cg4_group' => $row['cg4_group'],
        );
    }
    // for ($i = 0; $i < count($myObj['roster_date']); $i++){
    //     echo var_dump($myObj['roster_date'][$i]);
    // }
    $myObj = json_encode($myObj);
    echo $myObj;
    
    // if server == post request then echo display table
    
    
    // Free resultset
    pg_free_result($result4);
    
    // Closing connection
    pg_close($dbconn);
        
?>