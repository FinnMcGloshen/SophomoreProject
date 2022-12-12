<?php
$dbconn = pg_connect("host=localhost dbname=aaronwork user=aaronwork password=gamecube")
or die('Could not connect: ' . pg_last_error());

// initialize data variables
$dataObj = array();
$dataObj['supervisors'] = array();
$dataObj['doctors'] = array();
$dataObj['caregivers'] = array();

// queries by role
$superSearch = pg_query($dbconn, "SELECT fname, lname FROM accounts WHERE role = 'Supervisor';");
$doctorSearch = pg_query($dbconn, "SELECT fname, lname FROM accounts WHERE role = 'Doctor';");
$caregiverSearch = pg_query($dbconn, "SELECT fname, lname FROM accounts WHERE role = 'Caregiver';");


// pushing results to arrays
while ($row = pg_fetch_row($caregiverSearch)){
    array_push($dataObj['caregivers'], $row[0]." ".$row[1]);
};

while ($row = pg_fetch_row($doctorSearch)){
    array_push($dataObj['doctors'], $row[0]." ".$row[1]);
};

while ($row = pg_fetch_row($superSearch)){
    array_push($dataObj['supervisors'], $row[0]." ".$row[1]);
};

// echo var_dump($dataObj['doctors']);
// echo var_dump($dataObj['caregivers']);
// echo var_dump($dataObj['supervisors']);

$myJSON = json_encode($dataObj);
echo $myJSON;

pg_close($dbconn);
?>

