//Sebastian Snyder
"use strict";

// this file checks that user inputted into the administrator account creation form aligns with the database parameters and follows the same
// methodologies as the initial administrator login. 
window.onload = pageLoad;
function pageLoad(){
    $("username").onblur=chkLog1;
    $("pswd").onblur=chkLog2;
    $("code").onblur=chkLog3;
    $("submitbutton").onclick=chkLogFinal;
}

function chkLog1(){
    var uname = $("username").value;
    var regex = /^admin[A-Za-z_0-9]{1,7}$/; // chks that "username" begins with 'admin' followed by up to 7 characters. 
    var result = regex.test(uname);
    console.log("Username Pass RegEx: ",result);
    if (result){
        new Ajax.Request("../admin/regcheck.php",
        {
            method: "get",
            parameters: {parameter1:uname},
            onSuccess: validUser
        }
        );
    }else{
        alert("The selected username does not fit the parameters or is empty");
        $('username').focus();
        $('username').select();
        return false;
    }
}

function validUser(ajax){
    var result = ajax.responseText;
    console.log("Taken username: ",result);
    if (result == "true"){
        alert("That username is already taken. \n Please try again!");
        $("username").focus();
        $("username").select();
        return false;
    }else {
        return true;
    }

}

function chkLog2(){
    var pwd = $("pswd").value;
    var regex = /^#[A-Za-z_0-9]{1,11}$/; // chks that "pswd" begins with '#' followed by up to 11 characters. 
    var result = regex.test(pwd);
    console.log("Password Pass RegEx: ",result);
    if (result){
        return true;
    }else{
        alert("The selected password does not fit the parameters or is empty");
        $("pswd").focus();
        //$("pswd").select();
        return false;
    }
}

//checks secret code 
function chkLog3(){
    var code = $("code").value;
    console.log("User input for code: ",code);

    new Ajax.Request("../admin/codecheck.php",
    {
        method: "get",
        parameters: {parameter1:code},
        onSuccess: displayResult
    }
    );
}

function displayResult(ajax){
    var result = ajax.responseText;
    //alert(ajax.responseText);
    console.log("Is code correct: ",result);
    if (result == "true"){
        return true;
    }
    else{
        alert("The code you entered is incorrect. \n Please refer to the Employee Manual for guidance.");
        $("regform").reset();
        return false;
    }
}

function chkLogFinal(){
    var uname = $("username").value;
    var pwd = $("pswd").value;
    var sekret = $("code").value;
    if (!uname || !pwd || !sekret){
        alert("Missing 1 or more parameters!");
        $("username").focus();
        return false; 
    }
}