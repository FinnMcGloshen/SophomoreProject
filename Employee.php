<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee
    </title>
    
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="Employee.css" />
</head>
<body>
<div class="Btn-Fix">
      <button onclick="history.go(-1);" class="Redirect-Home"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
      </svg>Go Back</a></button>
    </div>
    <div class="employee">
    <h2 class="Welcome-Greeting-1">Millstream Village Employee List</h2>
        <br>
        <div class="Main-Table">
        <table>
        <tbody>
          <tr class="table-title">
            <th class="table-data">Employee ID</th>
            <th class="table-data">Employee Name</th>
            <th class="table-data">Employee Role</th>
            <th class="table-data">Employee Salary</th>
          </tr>
    </div>
        <?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
// $query1 = 'DROP TABLE IF EXISTS employees;';
// $query2 = 'CREATE TABLE employees (id int, name text, role text, salary int);';
// $query3 = "INSERT INTO employees(id,name,role,salary)
// VALUES (1,'John Smith', 'Admin', 120000),
// (2,'Dan Miller', 'Supervisor', 100000),
// (3,'Mary Lawrence', 'Supervisor', 100000),
// (4,'Christine Philips', 'Doctor', 90000),
// (5,'Jim Spencer', 'Doctor', 90000),
// (6,'Wendy Harrington', 'Doctor', 90000),
// (7,'Barbara Stevens', 'Caregiver', 80000),
// (8,'Steve Johnson', 'Caregiver', 80000),
// (9,'Craig Morgan', 'Caregiver', 80000),
// (10,'Abby Watson', 'Caregiver', 80000);";
$query4 = 'SELECT * FROM employees ORDER BY id;';
// $result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
// $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
// $result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
$result4 = pg_query($query4) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
// echo "<table>\n";
while ($line = pg_fetch_array($result4, null, PGSQL_ASSOC)) {
    echo "\t<tr class='table-title'>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td class='table-data'>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
if(isset($_POST['submit'])&&!empty($_POST['submit'])){
  $empid = $_POST['empid'];
  $newsalary = $_POST['newsalary'];
  $datatoupdate = array('salary'=>$newsalary);
  $condition = array('id'=>$empid);
  $res = pg_update($dbconn, 'employees', $datatoupdate, $condition);
  header("Refresh:0");
  if($res){
    echo "data is updated: $res\n";
  } else{
    echo "update failed";
  }
}
// Free resultset
pg_free_result($result4);

// Closing connection
pg_close($dbconn);
?>
        </div>
        <div class="Emp-Input-Tidy-Up">
      <div class="Emp-Input-Data1">
        <form method="POST">
        <input type="text" placeholder="Emp ID #:" id="empid" name="empid"/>
      </div>
      <div class="Emp-Input-Data2">
        <input type="number" min="0.00" step="0.01" placeholder="New Salary:" id="newsalary" name="newsalary"/>
      </div>
    </div>
    <br />
    <!-- <div id="confirmation" class="model-container">
      <div class="model">
        <section>
          <header class="model-header">
            <span onclick="onCancel()"></span>
            <h2>Are you sure you want to confirm?</h2>
          </header>
          <section class="model-content">
            <p>This action cannot be undone!</p>
          </section>
          <footer class="model-footer">
            <button class="model-btn" onclick="onCancel()">Cancel</button>
            <button class="model-btn model-confirm-btn" onclick="onConfirm()">
              Confirm
            </button>
          </footer>
        </section>
      </div>
    </div> -->
    <div class="Emp-Btn-Style">
      
      <input class="Emp-Pg-Btn1" onclick="onDelete()" name="submit" placeholder="Okay" type="submit"></input>
      <button class="Emp-Pg-Btn2">Cancel</button>
</form>
    </div>
    <br />
    <div class="loader"></div>
</body>
<script>
    window.addEventListener("load", () =>{
    const loader = document.querySelector(".loader");

    loader.classList.add("loader-hidden")

    loader.addEventListener("transitionend", () => {
        document.body.removeChild("loader");
    })
} )
function onCancel() {
        let confirmation = document.getElementById("confirmation");
        confirmation.classList.remove("model-open");
      }
      function onConfirm() {
        onCancel();
      }
      document.addEventListener("DOMContentLoaded", () => {
        document
          .getElementById("confirmation")
          .addEventListener("click", onCancel);
        document
          .querySelector(".model")
          .addEventListener("click", (e) => e.stopPropagation());
      });
      function onDelete() {
        let confirmation = document.getElementById("confirmation");
        if (!confirmation.classList.contains("model-open")) {
          confirmation.classList.add("model-open");
        }
      }
    </script>
</html>