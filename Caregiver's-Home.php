<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="Caregiver's-Home.css" />
    <title>Caregiver's Home</title>
<style>.box{
  height: 20px;
  width: 20px;
}
</style>
  </head>
  <body>
    <nav>
      <ul>
        <li>
          <a href="Caregiver's-Home.php">
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
          <a href="roster.php">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-person-badge"
              viewBox="0 0 16 16"
            >
              <path
                d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
              />
              <path
                d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"
              />
            </svg>
            <span class="millstream-nav-page">Roster Page</span>
          </a>
        </li>
        <li>
          <a href="Patients.html">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-people-fill"
              viewBox="0 0 16 16"
            >
              <path
                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"
              />
            </svg>
            <span class="millstream-nav-page">Patient's Page</span>
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
    <h2 class="Welcome-Greeting-1">Welcome Back!</h2>
    <br />
    <h2 class="Welcome-Greeting-2">List of Patient's Duty Today:</h2>
    <br />
    <div class="Caregiver-Table">
      <table>
        <tbody>
          <tr class="table-title">
            <th class="table-data">Name</th>
            <th class="table-data">Morning Medicine</th>
            <th class="table-data">Afternoon Medicine</th>
            <th class="table-data">Night Medicine</th>
            <th class="table-data">Breakfast</th>
            <th class="table-data">Lunch</th>
            <th class="table-data">Dinner</th>
          </tr>
          <tr class="table-title">
            <td class="table-data">Micheal Jenkins</td>
            <td class="table-data"><input type="checkbox" id="1" class="box"></input></td>
            <td class="table-data"><input id="2" type="checkbox" class="box"></td>
            <td class="table-data"><input id="3" type="checkbox" class="box"></td>
            <td class="table-data"><input id="4" type="checkbox" class="box"></td>
            <td class="table-data"><input id="5" type="checkbox" class="box"></td>
            <td class="table-data"><input id="6" type="checkbox" class="box"></td>
            
          </tr>
          <tr class="table-title">
            <td class="table-data">Benjamin Edwards</td>
            <td class="table-data"><input id="7" type="checkbox" class="box"></td>
            <td class="table-data"><input id="8" type="checkbox" class="box"></td>
            <td class="table-data"><input id="9" type="checkbox" class="box"></td>
            <td class="table-data"><input id="10" type="checkbox" class="box"></td>
            <td class="table-data"><input id="11" type="checkbox" class="box"></td>
            <td class="table-data"><input id="12" type="checkbox" class="box"></td>
          </tr>
          <tr class="table-title">
            <td class="table-data">William Johnson</td>
            <td class="table-data"><input id="13" type="checkbox" class="box"></td>
            <td class="table-data"><input id="14" type="checkbox" class="box"></td>
            <td class="table-data"><input id="15" type="checkbox" class="box"></td>
            <td class="table-data"><input id="16" type="checkbox" class="box"></td>
            <td class="table-data"><input id="17" type="checkbox" class="box"></td>
            <td class="table-data"><input id="18" type="checkbox" class="box"></td>
          </tr>
          <tr class="table-title">
            <td class="table-data">Cheryl Adams</td>
            <td class="table-data"><input id="19" type="checkbox" class="box"></td>
            <td class="table-data"><input id="20" type="checkbox" class="box"></td>
            <td class="table-data"><input id="21" type="checkbox" class="box"></td>
            <td class="table-data"><input id="22" type="checkbox" class="box"></td>
            <td class="table-data"><input id="23" type="checkbox" class="box"></td>
            <td class="table-data"><input id="24" type="checkbox" class="box"></td>
          </tr>
          <tr class="table-title">
            <td class="table-data">Barbara Davis</td>
            <td class="table-data"><input id="25" type="checkbox" class="box"></td>
            <td class="table-data"><input id="26" type="checkbox" class="box"></td>
            <td class="table-data"><input id="27" type="checkbox" class="box"></td>
            <td class="table-data"><input id="28" type="checkbox" class="box"></td>
            <td class="table-data"><input id="29" type="checkbox" class="box"></td>
            <td class="table-data"><input id="30" type="checkbox" class="box"></td>
          </tr>
          <tr class="table-title">
            <td class="table-data">Richard Nelson</td>
            <td class="table-data"><input id="31" type="checkbox" class="box"></td>
            <td class="table-data"><input id="32" type="checkbox" class="box"></td>
            <td class="table-data"><input id="33" type="checkbox" class="box"></td>
            <td class="table-data"><input id="34" type="checkbox" class="box"></td>
            <td class="table-data"><input id="35" type="checkbox" class="box"></td>
            <td class="table-data"><input id="36" type="checkbox" class="box"></td>
          </tr>
          <tr class="table-title">
            <td class="table-data">Robert Peterson</td>
            <td class="table-data"><input id="37" type="checkbox" class="box"></td>
            <td class="table-data"><input id="38" type="checkbox" class="box"></td>
            <td class="table-data"><input id="39" type="checkbox" class="box"></td>
            <td class="table-data"><input id="40" type="checkbox" class="box"></td>
            <td class="table-data"><input id="41" type="checkbox" class="box"></td>
            <td class="table-data"><input id="42" type="checkbox" class="box"></td>
          </tr>
          <tr class="table-title">
            <td class="table-data">Carol Mitchell</td>
            <td class="table-data"><input id="43" type="checkbox" class="box"></td>
            <td class="table-data"><input id="44" type="checkbox" class="box"></td>
            <td class="table-data"><input id="45" type="checkbox" class="box"></td>
            <td class="table-data"><input id="46" type="checkbox" class="box"></td>
            <td class="table-data"><input id="47" type="checkbox" class="box"></td>
            <td class="table-data"><input id="48" type="checkbox" class="box"></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="Caregiver-Btn-Tidy-Up">
      <button class="Btn-Style-1" onclick="save()">Save</button>
      <button class="Btn-Style-2" onclick="clear()">Clear</button>
      
    </div>
    <br />
  </body>
  <script>
let boxes = document.getElementsByClassName('box').length;
function save() {	
  for(let i = 1; i <= boxes; i++){
	  var checkbox = document.getElementById(String(i));
    localStorage.setItem("checkbox" + String(i), checkbox.checked);	
  }
}
//for loading
for(let i = 1; i <= boxes; i++){
  if(localStorage.length > 0){
    var checked = JSON.parse(localStorage.getItem("checkbox" + String(i)));
    document.getElementById(String(i)).checked = checked;
  }
}
window.addEventListener('change', save);
function clear(){
  localStorage.clear();
}
    </script>
</html>
