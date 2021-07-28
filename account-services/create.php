<!DOCTYPE html>
<html>
<head>
	<title>Account Creation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="../css/main.css" title="style" >
	<link rel="stylesheet" type="text/css" href="../css/hayley.css" title="style" /> -->
	<link rel="stylesheet" type="text/css" href="../css/light-theme.css" title="style" id="theme"/>
	<script type = "text/javascript" src= "../JS/modeSwitch.js"> </script>
</head>
<body>

<?php

	#connect to mysql database
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","ssnyder3","ssnyder3","ssnyder3");

	if (mysqli_connect_errno())
		exit("Error - could not connect to MySQL");


	$apt = $_POST["UnitID"];
	$first = $_POST["fname"];
	$last = $_POST["lname"];
	$usern = $_POST["username"];
	$pword = $_POST["pswd"];
	$pword2 = $_POST["pswd2"];

    $apt = mysqli_real_escape_string($db,$_POST["UnitID"]);
	$first = mysqli_real_escape_string($db,$_POST["fname"]);
	$last = mysqli_real_escape_string($db,$_POST["lname"]);
	$usern = mysqli_real_escape_string($db,$_POST["username"]);
	$pword = mysqli_real_escape_string($db,$_POST["pswd"]);
	$pword2 = mysqli_real_escape_string($db,$_POST["pswd2"]);

	if (preg_match("/[0-9]/", $apt) && $apt<=30 && $pword == $pword2){ #limits apartment complex to 30 units and confirms password verification 

		# duplicate unitID prevention
		$constructed_query = "SELECT * FROM resident";
		$result = mysqli_query($db, $constructed_query);
		$num_row = mysqli_num_rows($result);
		for($row_num=1; $row_num<=$num_row; $row_num++){
			$row_array = mysqli_fetch_array($result);
			if($row_array['UnitID']==$apt){
                
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
				print("<h1> That apartment is already taken.</h1>");
				print("<p> You either accidentally entered the wrong unit ID, or don't know which units are available</p>");
				print("<p> Return to Registration Form and try again.</p>");
				exit;
			}
            if($row_array['usr']==$usern){
            
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
                print("<h1> That username is already taken.</h1>");
				print("<p> Return to Registration Form and try again.</p>");
				exit;
            }
		}
		if(preg_match("/^[A-Za-z]{1,28}$/", $first) && preg_match("/^[A-Za-z]{1,28}$/", $last) && preg_match("/^[A-Za-z]{1,28}$/", $usern) && preg_match("/^[A-Za-z]{1,12}$/", $pword)){
			#create account creation query
			$constructed_query = "INSERT INTO resident (UnitID,fname,lname,usr,pword) values ('$apt',
			'$first','$last','$usern','$pword')";
			#execute query
			$result = mysqli_query($db, $constructed_query);


			?>


			<a class = "return" href="../indexANDadmin/index.html">Logout</a>
			<img src="../assets/site/LOGO.png"
				alt="logo">
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
				<h1 class="pgtitle">Success</h1> 
				<?php
		}
		else{
			?>

			<img src="../assets/site/LOGO.png"
            alt="logo">

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
			print("<h1> ERROR.</h1>");
			print("<p> Registration form does not meet the requirements.</p>");
			print("<p> Return to Registration Form and try again.</p>");
			exit;
		}

	}
	elseif($apt>30){
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
		print("<h1> ERROR.</h1>");
		print("<p> This complex only has 30 apartment units</p>");
		print("<p> Return to Registration Form and try again.</p>");
		exit;
	}
	elseif($pword != $pword2){
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
		print("<h1> ERROR.</h1>");
		print("<p> Your passwords do not match</p>");
		print("<p> Return to Registration Form and try again.</p>");
		exit;
	}
	else{
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
		print("<h1> ERROR.</h1>");
		print("<p>Invalid apartment entry.</p>");
		print("<p> Return to Registration Form and try again.</p>");
		exit;
	}
?>
</body>
		<footer>
            <p>
                A project for IS 448<br/>
                not for commercial use.
            </p>
        </footer>
</html