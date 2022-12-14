<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Patients-Home.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap"
      rel="stylesheet"
    />
    <title>Patient's Home</title>
  </head>
  <body>
    <nav>
      <ul>
        <li>
          <a href="Family-Member-Home.html">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-house"
              viewBox="0 0 16 16"
            >
              <path
                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"
              />
            </svg>
            <span class="millstream-nav-page">Home</span>
          </a>
        </li>
        <li>
          <a href="Login.php" class="log-out">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-box-arrow-left"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"
              />
              <path
                fill-rule="evenodd"
                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"
              />
            </svg>
            <span class="millstream-nav-page">Log Out</span>
          </a>
        </li>
      </ul>
    </nav>
    <div class="Welcome-Greeting-1">
      <h2>Patient's Home</h2>
    </div>
    <table class="Main-Table">
      <tbody>
        <tr class="table-title">
          <th class="table-data">Name</th>
          <th class="table-data">Morning Medicine</th>
          <th class="table-data">Afternoon Medicine</th>
          <th class="table-data">Evening Medicine</th>
          <th class="table-data">Doctor's Comments</th>
          <!-- <th class="table-data">Night Medicine</th>
          <th class="table-data">Breakfast</th>
          <th class="table-data">Lunch</th>
          <th class="table-data">Dinner</th> -->
        </tr>
        <?php 
  $dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
  or die('Could not connect: ' . pg_last_error());

    // $fields = implode (" , ", $fields);
    // $query1 = 'DROP TABLE IF EXISTS accounts;';
    // $query2 = 'CREATE TABLE prescriptions (pname text, mmed text, amed text, emed text, comm text);';
    // $query3 = "INSERT INTO prescriptions(pname,mmed,amed,emed,comm)
    // VALUES ('$pname','$mmed','$amed','$emed','$comm');";
    $query4 = "SELECT * FROM prescriptions;";
    // $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
    // $result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
    $result4 = pg_query($query4) or die('Query failed: ' . pg_last_error()); 
    // if($role == 'Patient'){
    //   $result3 = pg_query($additionalQuery) or die('Query failed: ' . pg_last_error());
    // } else {
    //   $result = pg_query($query3) or die('Query failed: ' . pg_last_error());
    // }
    // echo 'Account created!';
    // header('location: Login.php');
while ($line = pg_fetch_array($result4, null, PGSQL_ASSOC)) {
    echo "\t<tr class='table-title'>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td class='table-data'>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
// echo "</table>\n";
    pg_close($dbconn);
  ?>
      </tbody>
    </table>
    <div class="Patient-Search-Functions-Tidy-Up">
      <div class="Patient-Search-Style">
        <h2 class="Search-Title">Date:</h2>
        <input type="date" />
      </div>
      <div class="Patient-Search-Style">
        <h2 class="Search-Title">Patient Name:</h2>
        <input type="text" placeholder="Ex: John Doe" />
      </div>
      <div class="Patient-Search-Style">
        <h2 class="Search-Title">Patient ID:</h2>
        <input type="number" placeholder="Ex: 12345" />
      </div>
    </div>
    <div class="loader"></div>
    <script>
      window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");

        loader.classList.add("loader-hidden");

        loader.addEventListener("transitionend", () => {
          document.body.removeChild("loader");
        });
      });
      n = new Date();
      y = n.getFullYear();
      m = n.getMonth() + 1;
      d = n.getDate();
      document.getElementById("date").innerHTML = m + "/" + d + "/" + y;

      let boxes = document.getElementsByClassName("box").length;
      function save() {
        for (let i = 1; i <= boxes; i++) {
          var checkbox = document.getElementById(String(i));
          localStorage.setItem("checkbox" + String(i), checkbox.checked);
        }
      }
      //for loading
      for (let i = 1; i <= boxes; i++) {
        if (localStorage.length > 0) {
          var checked = JSON.parse(
            localStorage.getItem("checkbox" + String(i))
          );
          document.getElementById(String(i)).checked = checked;
        }
      }
      window.addEventListener("change", save);
      function clear() {
        localStorage.clear();
      }

    </script>
  </body>
</html>