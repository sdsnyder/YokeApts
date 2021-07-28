<!DOCTYPE html>
<html lang ="en">

<head>
  <title>Complaint File</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" type="text/css" href="../css/Taj.css" title="style" />
  <link rel="stylesheet" type="text/css" href="../css/main.css" title="style" /> -->
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
  //conenct to sql db
  $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3");

  //error handling
  if (mysqli_connect_errno())
    exit("Error - could not connect to MySQL");

  //capture html parameter
  $description = $_POST['description'];
  $usr = $_POST['usr'];
  
  $description = mysqli_real_escape_string($db,$_POST['description']);
  $usr = mysqli_real_escape_string($db,$_POST['usr']);
   ?>

   <?php
    // checking for valid user 
    $constructed_query ="SELECT usr FROM resident WHERE usr ='$usr'";
    $result = mysqli_query($db, $constructed_query);
    // IF THE $RESULT OBJECT IS NOT RETURNED, ERROR OUT
    if(! $result){
      print("Error - query could not be executed");
      $error = mysqli_error();
      print "<p> . $error . </p>";
      exit;
    }
    $num_rows = mysqli_num_rows($result); // STORE THE NUMBER OF ROWS RETURNED BY QUERY 
    if($num_rows == 0){ // IF NO ROWS ARE RETURNED, THE USER DOESNT MATCH
      ?>
      <h1 class="pgtitle">Username does not match database</h1>
      <p>please return to the complaint form and try again</p>
      <?php
      
      exit;
    }
    //print("CHECK PROGRAM IS WORKING MESSAGE: Number of rows returned: $num_rows <br />"); // TESTING 
    if($num_rows == 1){ // IF MATCHING ROW RETURNED, SUCCESS 
      $constructed_query = "INSERT INTO complaints (username, description, resstatus) VALUES('$usr','$description', 'no')";
      //execute query
      $result = mysqli_query($db, $constructed_query);
      //PRESENT success page
      ?>
      <h1 class="pgtitle"> Success! </h1>
      <?php
      print("<p>Thank you $usr, your complaint has been filed</p>");
    }
?>
</body>

</html>
