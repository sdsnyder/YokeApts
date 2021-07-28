// Joseph Steinman 
"use strict";

window.onload = pageLoad;
function pageLoad(){
    $("account_ID").onblur=chkTicket;
}

function chkTicket(){
    var uname = $("account_ID").value;
    var regex = /^[A-Za-z_0-9]{1,28}$/; 
    var result = regex.test(uname);
    console.log("Username Pass RegEx: ",result);
    if (result){
        new Ajax.Request("../service-center/ticketcheck.php",
        {
            method: "get",
            parameters: {parameter1:uname},
            onSuccess: validUser
        }
        );
    }else{
        alert("The selected username does not match or is empty");
        $("account_ID").focus();
        $("account_ID").select();
        return false;
    }
}

function validUser(ajax){
    var result = ajax.responseText;
    console.log("Taken username: ",result);
    if (result == "true"){
        return true;
    }else {
        alert("Not a valid username or empty.");
        $("account_ID").focus();
        $("account_ID").select();
        return false;
    }
}