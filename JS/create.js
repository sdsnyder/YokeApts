//Hayley Goodloe
"use strict";

window.onload = pageLoad;
function pageLoad(){
  document.getElementById("second").onblur=chkPasswords;
  document.getElementById("submitbutton").onclick=chkPasswords;
}

function chkPasswords() {
  var init_value = document.getElementById("pswd").value;
  var sec_value = document.getElementById("second").value;
  if (init_value == "") {
    alert("You did not enter a password. Please enter one now");
    document.getElementById("pswd").focus();
    return false;
  }
  if (init_value != sec_value) {
    alert("The two passwords you entered are not the same. Please re-enter both now");
    document.getElementById("pswd").focus();
    document.getElementById("pswd").select();
    document.getElementById("create").reset(); 
    return false;
  } 
  else{
    //alert("They match!");
    return true;
  }
}