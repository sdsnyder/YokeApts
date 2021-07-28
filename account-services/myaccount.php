<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="../css/main.css" title="style" >
	<link rel="stylesheet" type="text/css" href="../css/hayley.css" title="style" /> -->
	<link rel="stylesheet" type="text/css" href="../css/light-theme.css" title="style" id="theme"/>
	<script type = "text/javascript" src= "../JS/modeSwitch.js"> </script>
</head>
<body>

    <?php
        $ulog = $_POST["log"];
        $pword = $_POST["pswd"];

        $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3") OR DIE ("unable to connect to server. please try again later");
        $ulog = mysqli_real_escape_string($db,$_POST["log"]);
        $pword = mysqli_real_escape_string($db,$_POST["pswd"]);
        

        if(empty($ulog) || empty($pword)){ // CHECKS IF VALUES ARE EMPTY, IF SO, PAGE WONT LOAD AND WILL REQUEST USER TO RETURN TO LOGIN PAGE 
    ?>
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
                    <a href="../admin/register.html">Admin Register</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbutton">Account Services</button>
                <div class="dropcontent">
                    <a href="account-services.html">Account Services</a>
                    <a href="create.html">Create an Account</a>
                    <a href="myaccount.html">My Account</a>
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
        <h1> Login information was not entered </h1> <!-- USER VIEW -->
        <p> Please return to the login page <a href="myaccount.html">here</a> to retry.</p>
    <?php
        }


        // IF USER INPUT IS NOT EMPTY, IT WILL CONSTRUCT A QUERY FOR COMPARISON
        if(!(empty($ulog)) && !(empty($pword))){
            $constructed_query = "SELECT * FROM resident WHERE usr='$ulog' AND pword='$pword'";
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
            if($num_rows == 0){ // IF NO ROWS ARE RETURNED, THE LOGIN DOESNT MATCH, RETURN THEM TO LOGIN PAGE 
                ?>

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
                        <a href="../admin/register.html">Admin Register</a>
                    </div>
                </div>
    
                <div class="dropdown">
                    <button class="dropbutton">Account Services</button>
                    <div class="dropcontent">
                        <a href="account-services.html">Account Services</a>
                        <a href="create.html">Create an Account</a>
                        <a href="myaccount.html">My Account</a>
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
            <?php
                print("Invalid User Login");
                exit;
            }
            //print("CHECK PROGRAM IS WORKING MESSAGE: Number of rows returned: $num_rows <br />"); // TESTING 
            if($num_rows == 1){ // IF MATCHING ROW RETURNED, SUCCESS 
                //print("success! you have logged in.");
                ?>
        <a class = "return" href="../index.html">Logout</a>
        <img src="../assets/site/lightmode_logo.png"
            alt="logo" id="logo">
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
                <h1 class="pgtitle">Success!</h1>
                <p> you have logged in, you can now file complaints or service tickets</p>

                <?php
            }
        }
    ?>
    	<!--<p>CHECK PROGRAM IS WORKING MESSAGE: If this line is reached in the program, it means that the query worked</p> SUCCESS MESSAGE -->
    </body>
</html>