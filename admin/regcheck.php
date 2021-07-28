<?php
// Sebastian Snyder

// fetch user input
$usrn = $_GET["parameter1"];


$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3") OR DIE ("unable to connect to server. please try again later");

$constructed_query = "SELECT adminID FROM admininfo WHERE adminID='$usrn'"; // select all usernames from admin table where it equals user input
$result= mysqli_query($db, $constructed_query);

$num_rows = mysqli_num_rows($result); // see if any users are returned

if ($num_rows == 0){
    $response = "false"; // there is NOT a matching username
}else{
    $response = "true"; // there IS a matching username
}

echo $response;

?>