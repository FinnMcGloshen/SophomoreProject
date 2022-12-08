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
    <!-- <link rel="stylesheet" href="New-Roster.css" /> -->
    <title>New Roster</title>
    <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // initialize variables
        $roster_date = $_POST['roster_date'];
        $supervisor = $_POST['supervisor'];
        $doctor = $_POST['doctor'];
        $cg1 = $_POST['cg1'];
        $cg2 = $_POST['cg2'];
        $cg3 = $_POST['cg3'];
        $cg4 = $_POST['cg4'];
        $cg1_group = $_POST['cg1_group'];
        $cg2_group = $_POST['cg2_group'];
        $cg3_group = $_POST['cg3_group'];
        $cg4_group = $_POST['cg4_group'];
        $dbconn = pg_connect("host=localhost dbname=aaronwork user=aaronwork password=gamecube")
          or die('Could not connect: ' . pg_last_error());
        $data_insert = pg_query($dbconn, "INSERT into roster (roster_date, supervisor, doctor, cg1, cg2, cg3, cg4, cg1_group, cg2_group, cg3_group, cg4_group)
        VALUES ('$roster_date', '$supervisor', '$doctor', '$cg1', '$cg2', '$cg3', '$cg4', '$cg1_group', '$cg2_group', '$cg3_group', '$cg4_group');");
        pg_free_result($data_insert);
        pg_close($dbconn);
      }
    ?>
    <script>
      var returnData;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              var myObj = JSON.parse(this.responseText);
              // store data in global var
              returnData = myObj;
              console.log(returnData)
          }
      };
      xmlhttp.open("GET", "newRoster.php", true);
      // send global var
      xmlhttp.send(returnData);
      document.addEventListener('readystatechange', (e) => {
          if (document.readyState == 'complete'){
              populateOptions('Roles', returnData['supervisors'])
              populateOptions('Roles-2', returnData['doctors'])
              populateOptions('Roles-3', returnData['caregivers'])
              populateOptions('Roles-4', returnData['caregivers'])
              populateOptions('Roles-5', returnData['caregivers'])
              populateOptions('Roles-6', returnData['caregivers'])
              console.log('completed')
            }
          });

          // selected option, hide in other select boxes option hidden

      // ------------------
      // Populate functions
      // ------------------

      function populateOptions(selectName, arr){
        var selectElem = document.getElementById(selectName)
        var dataList = arr
        for(var i = 0; i < dataList.length; i++){
          // create option element with name & append
          var option = document.createElement('option')
          option.value = dataList[i]
          option.text = dataList[i]
          selectElem.appendChild(option)
      }
    }
    </script>
  </head>
  <body>
    <div class="New-Roster-Div">
      <h2><center>Create a New Roster:</center></h2>
      <form action="" method="POST">
        <div class="input-fields">
          <div class="New-Roster-Section-1">
            <div class="Section-1-Style">
              <h3>Supervisor:</h3>
              <br />
              <!-- SUPERVISOR -->
              <div class="username">
                <select name="supervisor" id="Roles" class="Doctor-Selection">
                  <option class="Doctor-Choices">Select a choice</option>
                </select>
              </div>
            </div>
            <div class="Section-1-Style">
              <h3>Doctor:</h3>
              <!-- DOCTOR -->
              <br />
              <div class="username">
                <select name="doctor" id="Roles-2" class="Doctor-Selection">
                  <option class="Doctor-Choices">Select a choice</option>
                </select>
              </div>
            </div>
            <div class="Section-1-Style">
              <h3>Caregiver #1:</h3>
              <br />
              <div class="username">
                <select name="cg1" id="Roles-3" class="cg_select Doctor-Selection">
                  <option value="Select a choice" class="Doctor-Choices">Select a choice</option>
                  <option value="Walter B." class="Doctor-Choices">Walter B.</option>
                  <option value="Robert L." class="Doctor-Choices">Robert L.</option>
                  <option value="Julian O." class="Doctor-Choices">Julian O.</option>
                  <option value="Amy A." class="Doctor-Choices">Amy A.</option>
                </select>
              </div>
              <select name="cg1_group">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
            </div>
          </div>
          <br />
          <div class="New-Roster-Section-1">
            <div class="Section-1-Style">
              <h3>Caregiver #2:</h3>
              <br />
              <div class="username">
                <select name="cg2" id="Roles-4" class="cg_select Doctor-Selection">
                  <option value="Select a choice" class="Doctor-Choices">Select a choice</option>
                  <option value="Walter B." class="Doctor-Choices">Walter B.</option>
                  <option value="Robert L." class="Doctor-Choices">Robert L.</option>
                  <option value="Julian O." class="Doctor-Choices">Julian O.</option>
                  <option value="Amy A." class="Doctor-Choices">Amy A.</option>
                </select>
                <select name="cg2_group">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
              </select>
              </div>
            </div>
            <div class="Section-1-Style">
              <h3>Caregiver #3:</h3>
              <br />
              <div class="username">
                <select name="cg3" id="Roles-5" class="cg_select Doctor-Selection">
                  <option value="Select a choice" class="Doctor-Choices">Select a choice</option>
                  <option value="Walter B." class="Doctor-Choices">Walter B.</option>
                  <option value="Robert L." class="Doctor-Choices">Robert L.</option>
                  <option value="Julian O." class="Doctor-Choices">Julian O.</option>
                  <option value="Amy A." class="Doctor-Choices">Amy A.</option>
                </select>
                <select name="cg3_group">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
              </select>
              </div>
            </div>
            <div class="Section-1-Style">
              <h3>Caregiver #4:</h3>
              <br />
              <div class="username">
                <select name="cg4" id="Roles-6" class="cg_select Doctor-Selection">
                  <option value="Select a choice" class="Doctor-Choices">Select a choice</option>
                  <option value="Walter B." class="Doctor-Choices">Walter B.</option>
                  <option value="Robert L." class="Doctor-Choices">Robert L.</option>
                  <option value="Julian O." class="Doctor-Choices">Julian O.</option>
                  <option value="Amy A." class="Doctor-Choices">Amy A.</option>
                </select>
                <select name="cg4_group">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
              </select>
              </div>
            </div>
          </div>
          <br />
          <div class="New-Roster-Section-2">
            <div class="Section-2-Style">
              <h3>Date:</h3>
              <br />
              <div class="username">
                <input name="roster_date" type="date" placeholder="Ex: 12345" />
              </div>
            </div>
          </div>
        </div>
        <button type="submit">Submit</button>
      </form>
      
      <br />
      <div id="confirmation" class="model-container">
        <div class="model">
          <section>
            <header class="model-header">
              <span onclick="onCancel()"></span>
              <h2>Are you sure you want to confirm these changes?</h2>
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
      <div class="Patient-Btn-Style">
        <button class="Patient-btn1" onclick="onDelete()">Okay</button>
        <button class="Patient-btn2">Cancel</button>
      </div>
      <br />
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
  </body>
</html>
