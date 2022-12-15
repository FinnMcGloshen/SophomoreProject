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
    <link rel="stylesheet" href="Family-Member-Home.css" />
    <title>Family Member's Home-Page</title>
    <script>
      var returnData;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              var myObj = JSON.parse(this.responseText);
              // store data in global var
              returnData = myObj;
              console.log(returnData)
              console.log('start')
              var familyCode = document.getElementById('family_code');
              var patient_id = document.getElementById('patient_id');
              familyCode.addEventListener('change', (e) => {
                familyCode = familyCode.value
                console.log(familyCode)
              })
              patient_id.addEventListener('change', (e) => {
                  patient_id = patient_id.value
                  console.log(patient_id)
              })
              var btn = document.getElementById('okay');
              btn.addEventListener('click', (e) => {
                if (familyCode != null){
                  data = document.getElementsByClassName('data')
                  for(var i = 0; i < returnData['prescriptions'].length; i++){
                    if (returnData['prescriptions'][i][0] == returnData[patient_id]['pname']){
                      data[0].innerHTML = returnData['prescriptions'][i][0]
                      data[1].value = returnData['prescriptions'][i][1]
                      data[2].value = returnData['prescriptions'][i][2]
                      data[3].value = returnData['prescriptions'][i][3]
                      data[4].value = returnData['prescriptions'][i][4]
                    }
                  }
                }
              })
          }
      };
      xmlhttp.open("GET", "familyData.php", true);
      // send global var
      xmlhttp.send(returnData);
    </script>
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
    <h2 class="Welcome-Greeting-1">Welcome!</h2>
    <br />
    <h2 class="Welcome-Greeting-2">Main Page Data:</h2>
    <br />
    <div class="Main-Table">
      <table>
        <tbody>
          <tr class="table-title">
            <th class="table-data">Patient's Name</th>
            <th class="table-data">Morning Medicine</th>
            <th class="table-data">Afternoon Medicine</th>
            <th class="table-data">Night Medicine</th>
            <th class="table-data">Comments</th>
          </tr>
          <tr class="table-title">
            <td class="data table-data"></td>
            <td class="table-data">
              <input class="data" id="1" type="text" class="box" />
            </td>
            <td class="table-data">
              <input class="data" id="2" type="text" class="box" />
            </td>
            <td class="table-data">
              <input class="data" id="3" type="text" class="box" />
            </td>
            <td class="table-data">
              <input class="data" id="4" type="text" class="box" />
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="Patient-Search-Functions-Tidy-Up">
      <div class="Patient-Search-Style">
        <h2 class="Search-Title">Date:</h2>
        <input type="date" class="search" />
      </div>
      <div class="Patient-Search-Style">
        <h2 class="Search-Title">Family Code:</h2>
        <input id="family_code" type="number" placeholder="Ex: 12345" class="search" />
      </div>
      <div class="Patient-Search-Style">
        <h2 class="Search-Title">Patient ID:</h2>
        <input id="patient_id" type="number" placeholder="Ex: 12345" class="search" />
      </div>
    </div>
    <div class="Family-Btn-Tidy-Up">
      <button id="okay" class="Btn-Style-1">Okay</button>
      <button class="Btn-Style-2">Cancel</button>
    </div>
    <br />
    <div class="loader"></div>
    <script>
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
      window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");

        loader.classList.add("loader-hidden");

        loader.addEventListener("transitionend", () => {
          document.body.removeChild("loader");
        });
      });
    </script>
  </body>
</html>
