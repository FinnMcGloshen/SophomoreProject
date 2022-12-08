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
    <link rel="stylesheet" href="Doctor's-Appointment.css" />
    <title>Doctor's Appointment</title>
    <script>
      var returnData;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              var myObj = JSON.parse(this.responseText);
              // store data in global var
              returnData = myObj;
              console.log(returnData['doctors'][0])
          }
      };
      xmlhttp.open("GET", "patientData.php", true);
      // send global var
      xmlhttp.send(returnData);
      // test input 'id'
      function inputCheck(){
        var id = document.getElementById('id');
        if(returnData[String(id.value)] != null){
          document.getElementById('name').value = returnData[String(id.value)][0];
        } else {
          document.getElementById('name').value = '';
        }
      }
      function selectPopulate(){
        document.addEventListener('readystatechange', (e) => {
          if (document.readyState == 'complete'){
            var selectElem = document.getElementById('Roles');
            for(var i = 0; i < returnData['doctors'].length; i++){
              // set option val & text
              var doctor = document.createElement('option')
              doctor.value = returnData['doctors'][i]
              doctor.text = returnData['doctors'][i]
              selectElem.appendChild(doctor)
            }
          }
        })
      }
      selectPopulate();
    </script>
  </head>
  <body>
    <div class="Payment-Div">
      <div class="title">Doctor's Appointment:</div>
      <div class="input-fields">
        <h3>Patient ID:</h3>
        <br>
        <div class="username">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="25"
            height="16"
            fill="currentColor"
            class="bi bi-person-vcard"
            viewBox="0 0 16 16"
          >
            <path
              d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z"
            />
            <path
              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z"
            />
          </svg>
          <input oninput="inputCheck()" id="id" name="id" type="text" placeholder="Ex: 12345" />
        </div>
        <h3>Date:</h3>
        <br>
        <div class="password">
          <input type="date" />
        </div>
        <h3>Doctor:</h3>
        <br>
        <div class="password">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
              </svg>
              <select name="Roles" id="Roles" class="Doctor-Selection">
                <option class="Doctor-Choices">Select a Doctor</option>
              </select>
        </div>
        <h3>Patient Name:</h3>
        <br>
        <div class="password">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
              </svg>
          <input disabled="true" id="name" name="name" type="text" placeholder="Ex: John Doe" />
        </div>
      </div>
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
      <div class="Patient-Btn-Style">
        <button class="Patient-btn1" onclick="onDelete()">Okay</button>
        <button class="Patient-btn2">Cancel</button>
      </div>
      <br />
    </div>
    <div class="loader"></div>
    <!-- <h3 class="successmsg">Doctor's Appointment made for:</h3>
    <h3></h3> -->
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
        // document.getElementById('name').value = 'CONFIRMED'
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
      function show(){

      }
    </script>
  </body>
</html>