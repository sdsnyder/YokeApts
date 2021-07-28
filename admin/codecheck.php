<?php
// Sebastian Snyder

// declare codeword and fetch user input
$realcode = "donut";
$usr = $_GET["parameter1"];
$result = strcmp($realcode, $usr);
if ($result ==0){
    $response="true"; //output validity check
}
else{
    $response="error"; //output validity check
}

echo $response;

?>