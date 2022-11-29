<?php
        $myObj = array();
        $dbconn = pg_connect("host=localhost dbname=aaronwork user=aaronwork password=gamecube")
        or die('Could not connect: ' . pg_last_error());
        $result = pg_query($dbconn, "SELECT id, name FROM patients;");
        while ($row = pg_fetch_row($result)) {
            // row[0] - id, row[1] - name
            $myObj[$row[0]] = $row[1];
        }
        $myJSON = json_encode($myObj);
        echo $myJSON;
        pg_close($dbconn);
?>