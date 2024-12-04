# COMP 484 - Full-Stack Web Devlopment Project
============================================

Project Description:
_____________________
This is a full-stack web application. 

Description of Files:
_____________________
index.html - This is main HTML file that contains the user registration form and login form. This means a user can either make a new account or login to an existing one.
reg.php - PHP script that handles registration checking to see if the username is taken, hashes the password, and stores users information in the MySQL database. If registering was successful then you will be redirected to the counter page.
login.php - PHP script that handles user login. It verfies credentials against the stored data in the database. If it is correct then the user will be in the counter page. 
index.php - The main application page that displays the current count. Users can increase their count by pressing the purple button. All information is also stored in MySQL.
logout.php - PHP script that handles user logout by destroying the session and redirecting the user back to the login/registration page ('index.html').

Completion Status:
_____________________
- User registration: complete
- User login: complete
- Count increment function: complete 
- Logout Function: complete

Issues:
_____________________
- None
