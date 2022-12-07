<?php
        $myObj = array();
        $dbconn = pg_connect("host=localhost dbname=aaronwork user=aaronwork password=gamecube")
        or die('Could not connect: ' . pg_last_error());
        $result = pg_query($dbconn, "SELECT id, fname, lname, admission_date FROM accounts WHERE role = 'Patient';");
        $doctorSearch = pg_query($dbconn, "SELECT fname, lname FROM accounts WHERE role = 'Doctor';");
        $myObj['doctors'] = array();
        while ($row = pg_fetch_row($result)) {
            // row[0] - id, row[1] - name
            $myObj[$row[0]] = array($row[1]." ".$row[2], $row[3]);
            
        }
        while ($row = pg_fetch_row($doctorSearch)){
            array_push($myObj['doctors'], $row[0]." ".$row[1]);
        };
        $myJSON = json_encode($myObj);
        echo $myJSON;

        pg_close($dbconn);
?>