<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: index.html");
    exit();
}

// database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// increment the count
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_count = $_SESSION['count'] + 1;
    $userid = $_SESSION['userid'];

    $sql = "UPDATE users SET count='$new_count' WHERE userid='$userid'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['count'] = $new_count;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
        }
        h1 {
            color: black;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            color: black;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: purple;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: blueviolet;
        }
        a {
            display: block;
            margin-top: 20px;
            font-size: 14px;
            color: blueviolet;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>Your current count: <?php echo $_SESSION['count']; ?></p>
        <form method="post" action="">
            <input type="submit" value="Increment Count">
        </form>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
