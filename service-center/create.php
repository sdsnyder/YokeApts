<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Service Center</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="../css/main.css" title="style" />
        <link rel="stylesheet" type="text/css" href="../css/joe.css" title="style" /> -->
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
			<div class="centerBox">
			<p> Yoke Apartments Service Tickets</p>
			<?php
			$commentuser = $_POST["account_ID"];
			$commenttype = $_POST["type"];
			$commentdesc = $_POST["description"];
			$datesubmit = date("Y/m/d");
			
			$db = mysqli_connect("studentdb-maria.gl.umbc.edu","ssnyder3","ssnyder3","ssnyder3");
	
			$commentuser = mysqli_real_escape_string ($db, $commentuser);
			$commenttype = mysqli_real_escape_string ($db, $commenttype);
			$commentdesc = mysqli_real_escape_string ($db, $commentdesc);
			?>
	
		<?php
        //CHECKING FOR VALID USER
            $constructed_query = "SELECT * FROM resident WHERE usr='$commentuser'";
            $result = mysqli_query($db, $constructed_query);
            if(! $result){
                print("Error - query could not be executed");
                $error = mysqli_error();
                print "<p> . $error . </p>";
                exit;
              }
            $num_rows = mysqli_num_rows($result); // STORE THE NUMBER OF ROWS RETURNED BY QUERY 
            if($num_rows == 0){ 
                ?>
                <h1 class="pgtitle">ERROR</h1>
                <p>User was not found in the database.</p>
                <?php
            }
            if($num_rows == 1){
                $constructed_query = "INSERT INTO servicetickets (user, received, res_status, description, type) values ('$commentuser', '$datesubmit', 'no', '$commentdesc', '$commenttype')";
                $result = mysqli_query($db, $constructed_query);
                print("<p>Thank you ");
                echo htmlspecialchars($commentuser);
                print(" for submitting your service ticket. We will get working on your issue ASAP.<br /> We have sent a coupon for a free donut of your choice for the inconvenience.</p>"); 
            }

		?>

		</div> <!--end center box-->
			<footer>
			<img class="donut2" src="../assets/promo/monpastry_rescale.png" alt="donut2" width="200">
            <p>
                A project for IS 448<br/>
                not for commercial use.
            </p>
        </footer>
    </body>
</html>