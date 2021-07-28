//Sebastian Snyder
"use strict";


function timer(){
    var counter = setInterval(notification,10500);
}

function notification(){
    new Ajax.Request("../admin/notification.php",
    {
        method: "get",
        onSuccess: displayUpdate
    }
    );
}

function displayUpdate(ajax){
    var result = ajax.responseText;
    console.log("PHP Comparator Result: ",result);
    if (result == true){
        alert("There are new requests in the system!");
    }
    if (result == false){
        console.log("New DB Update Status: ", false);
    }else {
        console.log("Some error has occured");
    }
}
