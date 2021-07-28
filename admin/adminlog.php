<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Panel</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="../css/main.css" title="style" />
        <link rel="stylesheet" type="text/css" href="../css/sebastian.css" title="style" /> -->
		<link rel="stylesheet" type="text/css" href="../css/light-theme.css" title="style" id="theme"/>
		<script type = "text/javascript" src= "../JS/modeSwitch.js"> </script>
        <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js"></script>
        <script type = "text/javascript" src = "../JS/admin_notif.js"></script>
    </head>

    
    
    <?php
        $username = $_POST["username"];
        $pword = $_POST["pswd"];

        $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3") OR DIE ("unable to connect to server. please try again later");
        $username = mysqli_real_escape_string($db,$_POST["username"]);
        $pword = mysqli_real_escape_string($db,$_POST["pswd"]);

        if(empty($username) || empty($pword)){ // CHECKS IF VALUES ARE EMPTY, IF SO, PAGE WONT LOAD AND WILL REQUEST USER TO RETURN TO LOGIN PAGE 
    ?>
        <body>
        <img src="../assets/site/lightmode_logo.png"
            alt="logo" id="logo">

        <!-- 
            THIS IS THE NAVIGATION BAR, IF YOU FIND THAT YOU NEED TO ADD ANOTHER CHILD PAGE;
            USE THIS WITHIN YOUR RESPECTIVE 'DROPCONTENT' DIV CLASS; 
            <a href="your/directory/path">the name you want to see on the dropdown menu</a>
         -->           
        <div class="menuguide">
            <a href="../indexANDadmin/index.html" class="guidebutton">Home</a>
            <button class="modebutton" id="modeswitch" >Dark/Light Mode</button>
            <div class="dropdown">
                <button class="dropbutton">Administration</button>
                <div class="dropcontent">
                    <a href="../indexANDadmin/admin.html">Admin Login</a>
                    <a href="admin/register.html">Admin Register</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbutton">Account Services</button>
                <div class="dropcontent">
                    <a href="account-services/account-services.html">Account Services</a>
                    <a href="account-services/create.html">Create an Account</a>
                    <a href="account-services/myaccount.html">My Account</a>
                </div>
            </div>
                    
            <div class="dropdown">
                <button class="dropbutton">About</button>
                <div class="dropcontent">
                    <a href="about/about.html">Apartment History</a>
                    <a href="about/location.html">Location</a>
                    <a href="about/services.html">Services We Offer</a>
                    <a href="about/developmentteam.html">Development Team</a>
                </div>
            </div>
        </div>
        <h1> Login information was not entered </h1> <!-- USER VIEW -->
        <p> Please return to the login page <a href="../indexANDadmin/admin.html">here</a> to retry.</p>
    <?php
        }


        // IF USER INPUT IS NOT EMPTY, IT WILL CONSTRUCT A QUERY FOR COMPARISON
        if(!(empty($username)) && !(empty($pword))){
            $constructed_query = "SELECT * FROM admininfo WHERE adminID='$username' AND pword='$pword'";
            //print("CHECK PROGRAM IS WORKING MESSAGE: The query is: $constructed_query</br>"); //TESTING 
            $result= mysqli_query($db, $constructed_query);
        // IF THE $RESULT OBJECT IS NOT RETURNED, ERROR OUT
            if(! $result){
                print("Error - query could not be executed");
                $error = mysqli_error();
                print "<p> . $error . </p>";
                exit;
            }

            $num_rows = mysqli_num_rows($result); // STORE THE NUMBER OF ROWS RETURNED BY QUERY 
            if($num_rows == 0){
                // IF NO ROWS ARE RETURNED, THE LOGIN DOESNT MATCH, RETURN THEM TO LOGIN PAGE 
            ?>
            <body>
            <img src="../assets/site/lightmode_logo.png"
            alt="logo" id="logo">

        <!-- 
            THIS IS THE NAVIGATION BAR, IF YOU FIND THAT YOU NEED TO ADD ANOTHER CHILD PAGE;
            USE THIS WITHIN YOUR RESPECTIVE 'DROPCONTENT' DIV CLASS; 
            <a href="your/directory/path">the name you want to see on the dropdown menu</a>
         -->           
        <div class="menuguide">
            <a href="../indexANDadmin/index.html" class="guidebutton">Home</a>
            <button class="modebutton" id="modeswitch" >Dark/Light Mode</button>
            <div class="dropdown">
                <button class="dropbutton">Administration</button>
                <div class="dropcontent">
                    <a href="../indexANDadmin/admin.html">Admin Login</a>
                    <a href="admin/register.html">Admin Register</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbutton">Account Services</button>
                <div class="dropcontent">
                    <a href="account-services/account-services.html">Account Services</a>
                    <a href="account-services/create.html">Create an Account</a>
                    <a href="account-services/myaccount.html">My Account</a>
                </div>
            </div>
                    
            <div class="dropdown">
                <button class="dropbutton">About</button>
                <div class="dropcontent">
                    <a href="about/about.html">Apartment History</a>
                    <a href="about/location.html">Location</a>
                    <a href="about/services.html">Services We Offer</a>
                    <a href="about/developmentteam.html">Development Team</a>
                </div>
            </div>
        </div>
        <?php
                print("input does not match database");
                exit;
            }
            //print("CHECK PROGRAM IS WORKING MESSAGE: Number of rows returned: $num_rows <br />"); // TESTING 
            if($num_rows == 1){ // IF MATCHING ROW RETURNED, SUCCESS 
                //PRESENT ADMINISTRATION VIEW 
    ?>
        <body onload="timer()">
                <a class = "return" href="../indexANDadmin/index.html">Logout</a>
                <button class="modebutton" id="modeswitch" >Dark/Light Mode</button>
                <img src="../assets/site/lightmode_logo.png"
                alt="logo" id="logo">

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
        <p class = "adminlogin"> You have successfully logged in! <br />
        Use the navigation bar at the top to view tickets or resolve them. </p>
    <?php
            }
        }
    ?>
    </body>
</html>