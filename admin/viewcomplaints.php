<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Ticket Resolution</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="../css/main.css" title="style" />
        <link rel="stylesheet" type="text/css" href="../css/sebastian.css" title="style" /> --> 
		<link rel="stylesheet" type="text/css" href="../css/light-theme.css" title="style" id="theme"/>
		<script type = "text/javascript" src= "../JS/modeSwitch.js"> </script>
    </head>

    <body>
    <a class = "return" href="../indexANDadmin/index.html">Logout</a>
        <img src="../assets/site/lightmode_logo.png"
        alt="logo" id="logo">
        <button class="modebutton" id="modeswitch" >Dark/Light Mode</button>
    <!-- 
    THIS IS THE NAVIGATION BAR, IF YOU FIND THAT YOU NEED TO ADD ANOTHER CHILD PAGE;
    USE THIS WITHIN YOUR RESPECTIVE 'DROPCONTENT' DIV CLASS; 
    <a href="your/directory/path">the name you want to see on the dropdown menu</a>
    -->           
        <div class="menuguide">

            <div class="dropdown">
                <button class="dropbutton">Services</button>
                <div class="dropcontent">
                    <a href="viewtickethistory.php">View Tickets</a>
                    <a href="resolveservicetickets.html">Resolve Tickets</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbutton">Complaints</button>
                <div class="dropcontent">
                    <a href="viewcomplaints.php">View Complaints</a>
                    <a href="resolvecomplaints.html">Resolve Complaints</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbutton">Residents</button>
                <div class="dropcontent">
                    <a href="viewresidents.php">Active Residents</a>
                    <a href="terminate.html">Terminate Resident</a>
                </div>
            </div>
        </div>
<!-- END OF NAVIGATION BAR-->   

<?php
       $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3");
       $constructed_query = "SELECT * FROM complaints";
       $result = mysqli_query($db, $constructed_query);
       $num_row = mysqli_num_rows($result);
?>
    <h1 class="pgtitle">Complaint History</h1>
    <table id = "comps">
        <tr>
            <th>ComplaintID</th>
            <th>Username</th>
            <th>Description</th>
            <th>Resolved?</th>
        </tr>   
<?php
    for($row_num = 1; $row_num<=$num_row; $row_num++){
        print("<tr>");
        $row_array = mysqli_fetch_array($result);
        print("<td> $row_array[complaintID]</td>
        <td> $row_array[username]</td>
        <td> $row_array[description]</td>
        <td> $row_array[resstatus]</td>");
        print("</tr>");
    }
?>
    </table>  
<?php
?> 
    </body>
</html>