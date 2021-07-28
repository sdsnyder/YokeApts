<?php
//Sebastian Snyder

// alert notification on admin home page 

$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3") OR DIE ("unable to connect to server. please try again later");

$constructed_query1 = "SELECT * FROM complaints"; // select all from complaints
$result1= mysqli_query($db, $constructed_query1);

$constructed_query2 = "SELECT * FROM servicetickets"; // select all servicetickets
$result2= mysqli_query($db, $constructed_query2);

$constructed_query3 = "SELECT * FROM resident"; // select all from residents
$result3= mysqli_query($db, $constructed_query3);

//counts number of rows in each query 
$complaint_rows = mysqli_num_rows($result1);
$service_rows = mysqli_num_rows($result2);
$resident_rows = mysqli_num_rows($result3);

sleep(10); //delay php script for 10 seconds 

$constructed_query4 = "SELECT * FROM complaints"; // select all from complaints again
$result4= mysqli_query($db, $constructed_query4);

$constructed_query5 = "SELECT * FROM servicetickets"; // select all servicetickets again
$result5= mysqli_query($db, $constructed_query5);

$constructed_query6 = "SELECT * FROM resident"; // select all from residents again
$result6= mysqli_query($db, $constructed_query6);

//counts number of rows in each query 
$complaint_rows2 = mysqli_num_rows($result4);
$service_rows2 = mysqli_num_rows($result5);
$resident_rows2 = mysqli_num_rows($result6);

if ($complaint_rows != $complaint_rows2 || $service_rows != $service_rows2 || $resident_rows != $resident_rows2){ // if row count is different between initial and second queries for any table, returns 'new'
    $response = true;
}

if ($complaint_rows == $complaint_rows2 && $service_rows == $service_rows2 && $resident_rows == $resident_rows2){ // if row count is the same between initial and second queries for all tables, returns 'none'
    $response = false;
}

echo $response; 

?>

