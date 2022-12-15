<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="Patient-Of-Doctor.css" />
    <title>Patient Of Doctor</title>
  </head>
  <body>
    <div class="Btn-Fix">
      <button onclick="history.go(-1);" class="Redirect-Home"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
      </svg>Go Back</button>
    </div>
    <div class="Welcome-Greeting"><h2>Patient of Doctor:</h2></div>
    <br />
    <div class="POD-Input-Organise">
      <div class="POD-Input-Style">
        <h2>Patient Name:</h2>
        <input type="text" class="textinput" id="pname" />
      </div>
      <div class="POD-Input-Style">
        <h2>Current Medicine:</h2>
        <input type="text" class="textinput" id="topinput2" />
      </div>
    </div>
    <br />
    <div class="Main-Table">
      <table id="main-table">
        <tbody>
          <tr class="table-title">
            <th class="table-data">Date</th>
            <th class="table-data">Morning Medicine</th>
            <th class="table-data">Afternoon Medicine</th>
            <th class="table-data">Evening Medicine</th>
            <th class="table-data">Comments</th>
          </tr>
          <?php 
  $dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
  or die('Could not connect: ' . pg_last_error());

   if(isset($_POST['insertp'])){
    // form data
    $pname = $_POST['pname'];
    $mmed = $_POST['mmed'];
    $amed = $_POST['amed'];
    $emed = $_POST['emed'];
    $comm = $_POST['comm'];
   
    // $fields = implode (" , ", $fields);
    // $query1 = 'DROP TABLE IF EXISTS accounts;';
    // $query2 = 'CREATE TABLE prescriptions (pname text, mmed text, amed text, emed text, comm text);';
    $query3 = "INSERT INTO prescriptions(pname,mmed,amed,emed,comm)
    VALUES ('$pname','$mmed','$amed','$emed','$comm');";
    $query4 = "SELECT * FROM prescriptions WHERE pname = '$pname';";
    // $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
    $result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());
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
  }?>
         
        </tbody>
      </table>
    </div>
    <div class="Welcome-Greeting-2"><h2>Add a New Prescription:</h2></div>
    <div class="POD-Input-Organise">
      <div class="pinput" id="pinput">
        <div class="pinput1">
        <form method="POST" name="insertp">
        <div class="POD-Input-Style">
          <h2>Patient Name:</h2>
          <input type="text" class="textinput" id="patientname" name="pname">
        </div>
        <div class="POD-Input-Style">
          <h2>Morning Medicine:</h2>
          <input type="text" class="textinput" id="new1" name="mmed">
        </div>
        <div class="POD-Input-Style">
          <h2>Afternoon Medicine:</h2>
          <input type="text" class="textinput" id="new2" name="amed">
        </div>
        <div class="POD-Input-Style">
          <h2>Evening Medicine:</h2>
          <input type="text" class="textinput" id="new3" name="emed">
        </div>
        <div class="POD-Input-Style">
          <h2>Doctor's Comments:</h2>
          <input type="text" class="textinput" id="new4" name="comm">
        </div>
      </div>
    </div>
    <!-- <div class="popup" id="popup">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="100"
        height="100"
        fill="green"
        class="bi bi-check-circle-fill"
        id="svg-style"
        viewBox="0 0 16 16"
      >
        <path
          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
        />
      </svg>
      <h2 class="popup">Thank You!</h2>
      <p class="popup">A New Perscription has been successfully added!</p>
      <button type="button" onclick="closePopUp()">Okay</button>
    </div> -->
    <!-- <div id="confirmation" class="model-container">
      <div class="model">
        <section>
          <header class="model-header">
            <span onclick="onCancel()"></span>
            <h2>Are you sure you want to add this perscription?</h2>
          </header>
          <section class="model-content">
            <p>This action cannot be undone!</p>
          </section>
          <footer class="model-footer"> -->
            <!-- <button class="model-btn" onclick="onCancel()">Cancel</button>
            <button
              class="model-btn model-confirm-btn"
              onclick="openPopUp(), onConfirm(), newrow()"
            >
              Confirm
            </button> -->
          </footer>
        </section>
      </div>
    </div>
    <div class="POD-Btn-Organise">
      <input class="POD-Btn-1" onclick="newrow()" type="submit" value="Okay" name="insertp"></input>
      <button class="POD-Btn-2" onclick="cancel()">Cancel</button>
      <form>
    </div>
    <br />
    <div class="loader"></div>
    <script>
      window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");

        loader.classList.add("loader-hidden");

        loader.addEventListener("transitionend", () => {
          document.body.removeChild("loader");
        });
      });

      let popup = document.getElementById("popup");

      function openPopUp() {
        popup.classList.add("open-popup");
      }
      function closePopUp() {
        popup.classList.remove("open-popup");
      }
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
      document.getElementById("1").value = getSavedValue("1");
      document.getElementById("2").value = getSavedValue("2");
      document.getElementById("3").value = getSavedValue("3");
      document.getElementById("4").value = getSavedValue("4");
      document.getElementById("5").value = getSavedValue("5");
      document.getElementById("6").value = getSavedValue("6");
      document.getElementById("7").value = getSavedValue("7");
      document.getElementById("8").value = getSavedValue("8");
      document.getElementById("9").value = getSavedValue("9");
      document.getElementById("10").value = getSavedValue("10");
      document.getElementById("11").value = getSavedValue("11");
      document.getElementById("12").value = getSavedValue("12"); // set the value to this input
      document.getElementById("13").value = getSavedValue("13");
      document.getElementById("14").value = getSavedValue("14");
      document.getElementById("15").value = getSavedValue("15");
      document.getElementById("16").value = getSavedValue("16");
      document.getElementById("17").value = getSavedValue("17");
      document.getElementById("18").value = getSavedValue("18");
      document.getElementById("19").value = getSavedValue("19");
      document.getElementById("20").value = getSavedValue("20"); // set the value to this input
      document.getElementById("21").value = getSavedValue("21");
      document.getElementById("22").value = getSavedValue("22");
      document.getElementById("23").value = getSavedValue("23");
      document.getElementById("24").value = getSavedValue("24");
      document.getElementById("25").value = getSavedValue("25");
      /* Here you can add more inputs to set value. if it's saved */

      //Save the value function - save it to localStorage as (ID, VALUE)
      function saveValue(e) {
        var id = e.id; // get the sender's id to save it .
        var val = e.value; // get the value.
        localStorage.setItem(id, val); // Every time user writing something, the localStorage's value will override .
      }

      //get the saved value function - return the value of "v" from localStorage.
      function getSavedValue(v) {
        if (!localStorage.getItem(v)) {
          return ""; // You can change this to your defualt value.
        }
        return localStorage.getItem(v);
      }
      n = new Date();
      y = n.getFullYear();
      m = n.getMonth() + 1;
      d = n.getDate();
      function newrow() {
        var x = document.getElementById("main-table").insertRow(-1);
        x.className = "table-title";
        var date = x.insertCell(0);
        date.className = "table-data";
        var cell1 = x.insertCell(1);
        cell1.className = "table-data";
        var cell2 = x.insertCell(2);
        cell2.className = "table-data";
        var cell3 = x.insertCell(3);
        cell3.className = "table-data";
        var cell4 = x.insertCell(4);
        cell4.className = "table-data";
        date.innerHTML = m + "/" + d + "/" + y;
        cell1.innerHTML = document.getElementById("new1").value;
        cell2.innerHTML = document.getElementById("new2").value;
        cell3.innerHTML = document.getElementById("new3").value;
        cell4.innerHTML = document.getElementById("new4").value;
      }
      function cancel() {
        var y = document.getElementById("main-table");
        y.deleteRow(-1);
      }
    </script>
  </body>
</html>
