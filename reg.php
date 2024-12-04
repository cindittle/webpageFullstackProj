<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashes pass

     // Prepare/bind
     $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $stmt->store_result();
     
     if ($stmt->num_rows > 0) {
        // Redirects to registration page with error message
        header("Location: reg.php?error=username_taken");
        exit();
    } else {
        $stmt->close();
        
        // Inserts new user
        $stmt = $conn->prepare("INSERT INTO users (username, password, count) VALUES (?, ?, 1)");
        $stmt->bind_param("ss", $username, $password);
        
        if ($stmt->execute()) {
            // If registration successful it will start session
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['count'] = 1;
            $_SESSION['userid'] = $conn->insert_id;
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration Error</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        p {
            font-size: 24px;
            color: rebeccapurple;
            font-weight: bold;
            margin-bottom: 20px;
        }
        a {
            font-size: 18px;
            color: blueviolet;
            text-decoration: underline;
        }
        </style>
    </head>
    <body>
        <div class="error-message">
            <p>Username already taken!</p>
            <a href="index.html">Click here to go back to Registration</a>
        </div>
    </body>
</html>
 
 <?php
 // will auto redirect to index.html after 10 seconds
 header("refresh:10;url=index.html");
 exit();
 ?>

