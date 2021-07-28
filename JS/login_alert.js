//Taj Abiwa
"use strict";

//alert("Test!");
window.onload=pageLoad;
function pageLoad(){
    document.getElementById("pswd").onkeydown=capsCheck;
    document.getElementById("pswd").onblur=validate;
    document.getElementById("loginbutton").onclick=validate;
}

function capsCheck(event) {
    var x = event.getModifierState("CapsLock");
    
    if (x){
        document.getElementById("demo").innerHTML = "Caps Lock activated!";
	
    } 
    else{
        document.getElementById("demo").innerHTML = "";
    }
}



function validate(){ //Retrieve username and password from HTML
  var user=document.getElementById("username").value;
  var pass=document.getElementById("pswd").value;



if(user=="admin1" && pass=="#highLand"|| user=="admin2" && pass=="#lowLand"   || user=="admin3" && pass=="#midLand" || user=="admin4" && pass=="#elevate"){
	//alert("Login successful!");
    return true;
  } 
else{
    alert("Invalid username or password. Please try again.");
    return false;
    //document.getElementById("adminform").reset(); 

}

  /*TODO: Regex still necessary?
  var pattern = /[A-Za-z_0-9]+$/i;
  var result = pattern.test(user);
  if(result == false){
    alert("Disallowed characters entered for username");
    return false;
    */
  }