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
                    <a href="../indexANDadmin/userindex.html" class="guidebutton">Home</a>

                    <div class="dropdown">
                        <button class="dropbutton">Service Center</button>
                        <div class="dropcontent">
                            <a href="../service-center/service-center.html">Service Home</a>
                            <a href="../service-center/create.html">Create a Ticket</a>
                            <a href="../service-center/view.html">View a Ticket</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="dropbutton">Complaints</button>
                        <div class="dropcontent">
                            <a href="complaints.html">Complaints Home</a>
                            <a href="file.html">File a Complaint</a>
                            <a href="view.php">View Complaints</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="dropbutton">About</button>
                        <div class="dropcontent">
                            <a href="../userabout/about.html">Apartment History</a>
                            <a href="../userabout/location.html">Location</a>
                            <a href="../userabout/services.html">Services We Offer</a>
                            <a href="../userabout/developmentteam.html">Development Team</a>
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
    <h1 class="pgtitle">Recent Complaints</h1>
    <table id = "comps">
        <tr>
            <th>Complaint ID</th>
            <th>Description</th>
            <th>Resolved?</th>
        </tr>   
<?php
    for($row_num = 1; $row_num<=$num_row; $row_num++){
        print("<tr>");
        $row_array = mysqli_fetch_array($result);
        print("<td> $row_array[complaintID]</td>
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