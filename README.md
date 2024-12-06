# Full-Stack Web Development Project

## Project Overview
This project is a full-stack web application designed to handle user registration, login, and a simple counter functionality. The application is built using PHP, MySQL, and HTML, and provides a basic demonstration of user authentication and session management.

---

## Features
- **User Registration**: Allows users to create an account with a unique username and securely hashed password.
- **User Login**: Authenticates users based on their credentials stored in the database.
- **Counter Functionality**: Users can increment their personalized counter and save their progress in the database.
- **User Logout**: Allows users to securely end their session and return to the login/registration page.

---

## File Descriptions
1. **`index.html`**  
   - Serves as the landing page for user registration and login.
   - Users can either register a new account or log in to an existing one.

2. **`reg.php`**  
   - Handles user registration by checking if the username is already taken.
   - Hashes passwords for secure storage in the MySQL database.
   - Redirects users to the counter page upon successful registration.

3. **`login.php`**  
   - Authenticates users by verifying their credentials against the database.
   - Redirects authenticated users to the counter page.

4. **`index.php`**  
   - Main application page where the user's current count is displayed.
   - Provides a button for users to increment their counter.
   - Saves counter information in the MySQL database.

5. **`logout.php`**  
   - Ends the user's session by destroying the session data.
   - Redirects users back to the login/registration page (`index.html`).

---

## Technologies Used
- **Frontend**: HTML5
- **Backend**: PHP
- **Database**: MySQL
- **Session Management**: PHP Sessions

---

## Setup Instructions
1. Clone or download the project files to your local system.
2. Set up a MySQL database with the required tables:
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(255) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL
   );

   CREATE TABLE counters (
       user_id INT PRIMARY KEY,
       count INT DEFAULT 0,
       FOREIGN KEY (user_id) REFERENCES users(id)
   );
