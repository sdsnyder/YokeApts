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
                            <a href="service-center.html">Service Home</a>
                            <a href="create.html">Create a Ticket</a>
                            <a href="view.html">View a Ticket</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="dropbutton">Complaints</button>
                        <div class="dropcontent">
                            <a href="../complaints/complaints.html">Complaints Home</a>
                            <a href="../complaints/file.html">File a Complaint</a>
                            <a href="../complaints/view.php">View Complaints</a>
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
       $usr= $_POST["usr"];

       $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3");
       $usr = mysqli_real_escape_string($db, $_POST["usr"]);

       $constructed_query = "SELECT * FROM servicetickets WHERE user ='$usr'";
       $result = mysqli_query($db, $constructed_query);
       $num_row = mysqli_num_rows($result);
       if($num_row == 0){ //if no valid username

            ?>
            <h1 class="pgtitle">Service Ticket History</h1>
            <h2> No user Found. Please try again.</h2>
            <?php
       }

       if($num_row == 1){ //if valid username

            ?>
    <h1 class="pgtitle">Service Ticket History</h1>
    <table id = "servtickets">
        <tr>
            <th>Ticket ID</th>
            <th>User</th>
            <th>Date Received</th>
            <th>Resolved?</th>
            <th>Description</th>
            <th>Type</th>
        </tr>   
            <?php
        for($row_num = 1; $row_num<=$num_row; $row_num++){
            print("<tr>");
            $row_array = mysqli_fetch_array($result);
            print("<td> $row_array[ticketID]</td>
            <td> $row_array[user]</td>
            <td> $row_array[received]</td>
            <td> $row_array[res_status]</td>
            <td> $row_array[description]</td>
            <td> $row_array[type]</td>");
            print("</tr>");
        }
    ?>
    </table> 
    <?php 
       }
       else{
           print("error. Could not resolve user.");
       }
    ?>
    </body>
</html>