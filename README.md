#Yoke Apartments
    This web application was created in collaboration with a group for a web development class, my individual contributions are described below. 

#### HTML: 
* index.html and admin.html (indexandadmin directory), and the general structure linking to all other pages 
* all html files in the admin directory dealing with registration, removal, and ticket resolution 

#### CSS: 
* The menu bar styling across the top of the page(css/Main.css lines 33*124)
* The slide show found on indexandadmin/index.html (css/Sebastian.css) 
* General color theme and page layout across all main pages 

#### JavaScript: 
* JS/adminnotif.js to send an ajax request to check if any updates were made to the database recently 
* JS/adminreg.js to allow 'administrators' to register for accounts and check against the database to ensure the username isn't already taken
* Aided teammates with login_alert.js(capsCheck function) and createticket.js (validUser function) 

#### PHP:
All the php files in the admin directory, these dealt with allowing administrators to register and login while checking their information against the database and allowed administrators to resolve any ticket complaints from residents. The adminreg.php and notification.php were used in conjunction with the Javascript files to perform Ajax requests. 
