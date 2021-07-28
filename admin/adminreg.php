<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Panel</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" type="text/css" href="../css/main.css" title="style" />
        <link rel="stylesheet" type="text/css" href="../css/sebastian.css" title="style" /> -->
		<link rel="stylesheet" type="text/css" href="../css/light-theme.css" title="style" id="theme"/>
		<script type = "text/javascript" src= "../JS/modeSwitch.js"> </script>
    </head>

    <body>
    
    <?php
        $username = $_POST["username"];
        $pword = $_POST["pswd"];
        $code = $_POST["code"];

        $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3") OR DIE ("unable to connect to server. please try again later");
        $username = mysqli_real_escape_string($db,$_POST["username"]);
        $pword = mysqli_real_escape_string($db,$_POST["pswd"]);
        $code = mysqli_real_escape_string($db,$_POST["code"]);

        if(empty($username) || empty($pword) || empty($code)){ // CHECKS IF VALUES ARE EMPTY, IF SO, PAGE WONT LOAD AND WILL REQUEST USER TO RETURN TO LOGIN PAGE 
    ?>
    <button class="modebutton" id="modeswitch" >Dark/Light Mode</button>
    <img src="../assets/site/lightmode_logo.png"
            alt="logo" id="logo">

        <!-- 
            THIS IS THE NAVIGATION BAR, IF YOU FIND THAT YOU NEED TO ADD ANOTHER CHILD PAGE;
            USE THIS WITHIN YOUR RESPECTIVE 'DROPCONTENT' DIV CLASS; 
            <a href="your/directory/path">the name you want to see on the dropdown menu</a>
         -->           
        <div class="menuguide">
            <a href="../indexANDadmin/index.html" class="guidebutton">Home</a>

            <div class="dropdown">
                <button class="dropbutton">Administration</button>
                <div class="dropcontent">
                    <a href="../indexANDadmin/admin.html">Admin Login</a>
                    <a href="register.html">Admin Register</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbutton">Account Services</button>
                <div class="dropcontent">
                    <a href="../account-services/account-services.html">Account Services</a>
                    <a href="../account-services/create.html">Create an Account</a>
                    <a href="../account-services/myaccount.html">My Account</a>
                </div>
            </div>
                    
            <div class="dropdown">
                <button class="dropbutton">About</button>
                <div class="dropcontent">
                    <a href="../about/about.html">Apartment History</a>
                    <a href="../about/location.html">Location</a>
                    <a href="../about/services.html">Services We Offer</a>
                    <a href="../about/developmentteam.html">Development Team</a>
                </div>
            </div>
        </div>
        <!-- END OF NAVIGATION BAR--> 
        <h1> Registration information was not entered </h1> <!-- USER VIEW -->
        <p> Please return to the registration page <a href="register.html">here</a> to retry.</p>
    <?php
        }


        // IF USER INPUT IS NOT EMPTY, IT WILL CONSTRUCT A QUERY FOR COMPARISON
        if(!(empty($username)) && !(empty($pword)) && !(empty($code))){
            if( $code == "donut"){
                $constructed_query = "INSERT INTO admininfo (adminID, pword) values ('$username', '$pword')";
                //print("CHECK PROGRAM IS WORKING MESSAGE: The query is: $constructed_query</br>"); //TESTING 
                $result= mysqli_query($db, $constructed_query);
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

            <!-- 
                THIS IS THE NAVIGATION BAR, IF YOU FIND THAT YOU NEED TO ADD ANOTHER CHILD PAGE;
                USE THIS WITHIN YOUR RESPECTIVE 'DROPCONTENT' DIV CLASS; 
                <a href="your/directory/path">the name you want to see on the dropdown menu</a>
            -->           
            <div class="menuguide">
                <a href="../indexANDadmin/admin.html" class="guidebutton">Administration Login</a>
            </div>
            <!-- END OF NAVIGATION BAR-->   
            <p class = "adminlogin"> You have successfully Registered! <br />
            Use the navigation bar at the top to login. </p>
    <?php
                }
            }
    ?>
    </body>
</html>