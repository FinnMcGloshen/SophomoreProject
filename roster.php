<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roster
    </title>
    <link
    href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap"
    rel="stylesheet"
  />
    <!-- <link rel="stylesheet" href="Roster.css"> -->
    <style>
        table,th,td{
            border:1px solid black
        }
    </style>
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
        xmlhttp.open("GET", "rosterData.php", true);
        xmlhttp.send(returnData);

        // populate select with for loop
        
        document.addEventListener('readystatechange', (e) => {
            if (document.readyState == 'complete'){
                var table = document.getElementsByTagName('table')[0];
                var keys = Object.keys(returnData)
                var selectElem = document.getElementById('select_name');
                // populate select element with options
                for (var i = 0; i < keys.length; i++){
                    var opt = document.createElement('option')
                    opt.value = String(keys[i])
                    opt.text = String(keys[i])
                    selectElem.appendChild(opt)
                }
                var line = document.getElementById('line')
                // listen for select change

                selectElem.addEventListener('change', (e) => {
                    tableDisplay(selectElem);
                });
                
                // Display date/table data
                function tableDisplay(selectElem){
                    table.style.visibility = 'visible';
                    var tableData = document.getElementsByClassName('query_data');
                    var dateHead = document.getElementById('date_head');
                    dateVal = selectElem.value;
                    dateHead.innerHTML = 'Date: ' + dateVal;
                    // change table data
                    tableData[0].innerHTML = dateVal;
                    tableData[1].innerHTML = returnData[String(dateVal)]['supervisor'];
                    tableData[2].innerHTML = returnData[String(dateVal)]['doctor'];
                    tableData[3].innerHTML = returnData[String(dateVal)]['cg1'];
                    tableData[4].innerHTML = returnData[String(dateVal)]['cg2'];
                    tableData[5].innerHTML = returnData[String(dateVal)]['cg3'];
                    tableData[6].innerHTML = returnData[String(dateVal)]['cg4'];

                    tableData[7].innerHTML = returnData[String(dateVal)]['cg1_group'];
                    tableData[8].innerHTML = returnData[String(dateVal)]['cg2_group'];
                    tableData[9].innerHTML = returnData[String(dateVal)]['cg3_group'];
                    tableData[10].innerHTML = returnData[String(dateVal)]['cg4_group'];
                }
            }
        });
        // select the select value, and use returnData[] to display data in table
        // var selectElem = document.getElementById('select_name');
        
        // console.log(selectElem)
    </script>
</head>
<body>
    <div class="Btn-Fix">
      <button onclick="history.go(-1);" class="Redirect-Home"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
      </svg>Go Back</a></button>
    </div>
    
    <div class="roster">
    <h2 class="Welcome-Greeting-1">
      Welcome to the Millstream Village Roster!
    </h2>
    <br />
    <h2 class="Welcome-Greeting-2">Current Roster:</h2>
    <br>
        <select name="select_date" id="select_name">
        <option>Select a date</option>
        </select>
        <h2 id="date_head" class="Welcome-Greeting-2">Date:</h2>
        <br>
        <div class="Main-Table">
            <table style="visibility: hidden">
                <thead>
                    <tr class="table-title">
                        <th class="table-data">Date</th>
                        <th class="table-data">Supervisor</th>
                        <th class="table-data">Doctor</th>
                        <th class="table-data">Caregiver #1</th>
                        <th class="table-data">Caregiver #2</th>
                        <th class="table-data">Caregiver #3</th>
                        <th class="table-data">Caregiver #4</th>
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td class="query_data"></td>
                        <td class="query_data"></td>
                        <td class="query_data"></td>
                        <td class="query_data"></td>
                        <td class="query_data"></td>
                        <td class="query_data"></td>
                        <td class="query_data"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="query_data">Patient Group </td>
                        <td class="query_data">Patient Group </td>
                        <td class="query_data">Patient Group </td>
                        <td class="query_data">Patient Group </td>
                    </tr>
                </tbody>
            </table>
        </div>

</body>
</html>