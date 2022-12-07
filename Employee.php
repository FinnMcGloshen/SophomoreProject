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
    <div class="employee">
    <h2 class="Emp-Pg-Title">Millstream Village Employee List</h2>
        <br>
        <div class="Emp-Tbl-UI">
        <table>
        <tbody>
          <tr class="Employee-Data">
            <th class="Emp-Tbl-Cells">Employee ID</th>
            <th class="Emp-Tbl-Cells">Employee Name</th>
            <th class="Emp-Tbl-Cells">Employee Role</th>
            <th class="Emp-Tbl-Cells">Employee Salary</th>
          </tr>
    </div>
        <?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query1 = 'DROP TABLE IF EXISTS employees;';
$query2 = 'CREATE TABLE employees (id int, name text, role text, salary int);';
$query3 = "INSERT INTO employees(id,name,role,salary)
VALUES (1,'John Smith', 'Admin', 120000),
(2,'Dan Miller', 'Supervisor', 100000),
(3,'Mary Lawrence', 'Supervisor', 100000),
(4,'Christine Philips', 'Doctor', 90000),
(5,'Jim Spencer', 'Doctor', 90000),
(6,'Wendy Harrington', 'Doctor', 90000),
(7,'Barbara Stevens', 'Caregiver', 80000),
(8,'Steve Johnson', 'Caregiver', 80000),
(9,'Craig Morgan', 'Caregiver', 80000),
(10,'Abby Watson', 'Caregiver', 80000);";
$query4 = 'SELECT * FROM employees;';
$result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
$result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
$result4 = pg_query($query4) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
// echo "<table>\n";
while ($line = pg_fetch_array($result4, null, PGSQL_ASSOC)) {
    echo "\t<tr class='Emoloyee-Data'>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td class='Emp-Tbl-Cells'>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result4);

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
        </div>
        <div class="Emp-Input-Tidy-Up">
      <div class="Emp-Input-Data1">
        <br />
        <form method="POST">
        <input type="text" placeholder="Emp ID #:" id="empid"/>
        <br />
      </div>
      <div class="Emp-Input-Data2">
        <br />
        <input type="number" min="0.00" step="0.01" placeholder="New Salary:" id="newsalary"/>
      </div>
    </div>
    <br />
    <div id="confirmation" class="model-container">
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
    </div>
    <div class="Emp-Btn-Style">
      <button class="Emp-Pg-Btn1" onclick="onDelete()">Okay</button>
      <button class="Emp-Pg-Btn2">Cancel</button>
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