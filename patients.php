<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients
    </title>
    <style>
        table,th,td{
            border:1px solid black
        }
    </style>
    <link
    href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap"
    rel="stylesheet"
  />
    <link rel="stylesheet" href="Patients.css">
</head>
<body>
<div class="Btn-Fix">
        <button onclick="history.go(-1);" class="Redirect-Home"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
        </svg>Go Back</a></button>
      </div>
    <div class="patients">
        <h2 class="Patient-Title-Page">Patients</h2>
        <br>
        <div class="Patient-Tbl-UI">
        <table>
            <tbody>
                <tr class="Patient-Data">
                    <th class="Patient-Data-Cells">Patient ID:</th>
                    <th class="Patient-Data-Cells">Patient Name:</th>
                    <th class="Patient-Data-Cells">Patient Age:</th>
                    <th class="Patient-Data-Cells">Emergency Contact:</th>
                    <th class="Patient-Data-Cells">Emergency Contact Name:</th>
                    <th class="Patient-Data-Cells">Admission Date:</th>
                </tr>
    </div>
        <?php 
        $dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
        or die('Could not connect: ' . pg_last_error());
    
    // Performing SQL query
    $query1 = 'DROP TABLE IF EXISTS patients;';
    $query2 = 'CREATE TABLE patients (id int, name text, age text, econtact bigint, econtactname text, admissiondate date);';
    $query3 = "INSERT INTO patients(id,name,age,econtact,econtactname,admissiondate)
    VALUES (1,'Micheal Jenkins', 83, 7175290527, 'Tim Jenkins', '2018-05-13'),
    (2,'Benjamin Edwards', 77, 7171249683, 'Frank Edwards', '2016-03-09'),
    (3,'William Johnson', 76, 7174239857, 'Lauren Johnson', '2020-09-27'),
    (4,'Cheryl Adams', 82, 7172031752, 'Bob Adams', '2019-10-11'),
    (5,'Barbara Davis', 78, 7171256783, 'Claire Davis', '2022-07-11'),
    (6,'Richard Nelson', 72, 7176641955, 'Philip Nelson', '2021-06-25'),
    (7,'Robert Peterson', 79, 7178471804, 'Eli Peterson', '2017-02-07'),
    (8,'Carol Mitchell', 84, 7176654012,'Jane Mitchell', '2020-01-24');";
    $query4 = 'SELECT * FROM patients;';
    $result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
    $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
    $result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
    $result4 = pg_query($query4) or die('Query failed: ' . pg_last_error());
    
    // Printing results in HTML
    
    // echo "<table>\n";
    while ($line = pg_fetch_array($result4, null, PGSQL_ASSOC)) {
        echo "\t<tr class='Patient-Data'>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td class='Patient-Data-Cells'>$col_value</td>\n";
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