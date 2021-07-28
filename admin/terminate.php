<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Resident Termination</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="../css/main.css" title="style" />
        <link rel="stylesheet" type="text/css" href="../css/sebastian.css" title="style" /> -->
		<link rel="stylesheet" type="text/css" href="../css/light-theme.css" title="style" id="theme"/>
		<script type = "text/javascript" src= "../JS/modeSwitch.js"> </script>
    </head>

    <body>
    <img src="../assets/site/lightmode_logo.png"
        alt="logo" id="logo">
        <button class="modebutton" id="modeswitch" >Dark/Light Mode</button>
        
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
        $user = $_POST["usr"];
        $unitID = $_POST["uID"];
        $auth = $_POST["auth"];
        $status = $_POST["choice2"]; 

        $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3") OR DIE ("unable to connect to server. please try again later");
        $user = mysqli_real_escape_string($db,$_POST["usr"]);
        $unitID = mysqli_real_escape_string($db,$_POST["uID"]);
        $auth = mysqli_real_escape_string($db,$_POST["auth"]);
        $status = mysqli_real_escape_string($db,$_POST["choice2"]); 

        if(!(empty($unitID)) && !(empty($status)) && !(empty($user)) && !(empty($auth))){
            if($auth == "donut"){

                $constructed_query = "DELETE FROM resident WHERE UnitID='$unitID' AND usr='$user'";
                $result = mysqli_query($db, $constructed_query);
                        // IF THE $RESULT OBJECT IS NOT RETURNED, ERROR OUT
                        if(! $result){
                            print("Error - query could not be executed");
                            $error = mysqli_error();
                            print "<p> . $error . </p>";
                            exit;
                        }
    ?>
        <!-- STATUS MESSAGE -->
        <h2> Status Updated </h2> 
        <p class="adminlogin"> check <a href="viewresidents.php"> View Residents </a> to verify </p>
    <?php
        }

    }
    if((empty($unitID)) || (empty($status)) || (empty($user)) || (empty($auth)) || $auth != "donut"){
    ?>
        <!-- STATUS MESSAGE -->
        <h2> Status Not Updated </h2> 
        <p class="adminlogin"> Invalid Form Entry</p>
    <?php
        }
    ?>
    </body>
</html>