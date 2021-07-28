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
    <?php
        $ticketID = $_POST["tID"];
        $resstatus = $_POST["choice2"]; 
        // TESTING print($ticketID);
        // TESTING print($resstatus);

        $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3") OR DIE ("unable to connect to server. please try again later");
        $ticketID = mysqli_real_escape_string($db,$_POST["tID"]);
        $resstatus = mysqli_real_escape_string($db,$_POST["choice2"]); 

        if(!(empty($ticketID)) && !(empty($resstatus))){
            $constructed_query = "UPDATE servicetickets SET res_status='$resstatus' WHERE ticketID='$ticketID'";
            $result = mysqli_query($db, $constructed_query);
                    // IF THE $RESULT OBJECT IS NOT RETURNED, ERROR OUT
                    if(! $result){
                        print("Error - query could not be executed");
                        $error = mysqli_error();
                        print "<p> . $error . </p>";
                        exit;
                    }
    ?>
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
                    <a href="resolveservicetickets.html ">Resolve Tickets</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbutton">Complaints</button>
                <div class="dropcontent">
                    <a href="viewcomplainthistory.html">View Complaints</a>
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
        <h2> Status Updated </h2> 
        <p class="adminlogin"> check <a href="viewtickethistory.php"> View Tickets </a> to verify </p>
    <?php
        }
    ?>
    </body>
</html>