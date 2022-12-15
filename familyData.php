<?php
$myObj = array();
$myObj['prescriptions'] = array();
$dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
or die('Could not connect: ' . pg_last_error());

$patientCredentials = "SELECT id, fname, lname, family_code FROM accounts WHERE role = 'Patient';";
$prescription = "SELECT * FROM prescriptions;";
$accountsQuery = pg_query($dbconn, $patientCredentials) or die('Query failed: ' . pg_last_error());
$prescriptionQuery = pg_query($dbconn, $prescription) or die('Query failed: ' . pg_last_error());

while ($row = pg_fetch_row($accountsQuery)){
    $myObj[$row[0]] = array(
        'pname' => $row[1].' '.$row[2],
        'family_code' => $row[3],
    );
}

while ($row = pg_fetch_row($prescriptionQuery)){
    array_push($myObj['prescriptions'], array($row[0],$row[1],$row[2], $row[3], $row[4]));
}

$myJSON = json_encode($myObj);
echo $myJSON;

pg_close($dbconn);

?>