<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      // initialize variables
      $group = $_POST['group'];
      $id = intval($_POST['id']);
      $dbconn = pg_connect("host=localhost dbname=newdb user=postgres password=pgadmin")
        or die('Could not connect: ' . pg_last_error());
      $result = pg_query($dbconn, "UPDATE accounts SET group_letter = '$group' WHERE id = $id;");
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
      xmlhttp.open("GET", "patientData.php", true);
      // send global var
      xmlhttp.send(returnData);
      // test input 'id'
      function inputCheck(){
        var id = document.getElementById('id');
        var admissionDate = document.getElementById('admissionDate');
        if(returnData[String(id.value)] != null){
          document.getElementById('name').value = returnData[String(id.value)][0];
          admissionDate.value = returnData[String(id.value)][1];
        } else {
          document.getElementById('name').value = '';
          admissionDate.value = '';
        }
      }
    </script>
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="Patient-Additional_Info.css" /> -->
    <title>Payment Additional Info</title>
  </head>
  <body>
    <div class="Payment-Div">
      <div class="title">Patient Additional Info</div>
      <div class="input-fields">
        <h3>Patient ID:</h3>
        <br>
        <form action="" method="POST">
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

            <input id="id" name="id" oninput="inputCheck()" type="text" placeholder="Ex: 12345" />
          </div>
          <h3>Group:</h3>
          <br>
          <div class="password">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                </svg>
            <input name="group" type="text" min="0.00" max="50000.00" step="0.01" placeholder="Ex: 12345" />
          </div>
          <h3>Admission Date:</h3>
          <br>
          <div class="password">
            <input id="admissionDate" type="date" disabled="true"/>
          </div>
          <h3>Patient Name:</h3>
          <br>
          <div class="password">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                </svg>
            <input name="name" type="text" id="name" disabled="true" />
          </div>
        </div>
        <div class="Patient-Btn-Style">
          <button class="Patient-btn1">Okay</button>
          <button class="Patient-btn2">Cancel</button>
        </div>
        <br />
      </div>
        </form>
        
        
  </body>
</html>
