<?php
// Connect to your MySQL database (Replace these with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];

    // Prepare SQL statement to insert the email into the mailing_list table
    $sql = "INSERT INTO mailing_list (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER["HTTP_REFERER"] . "?success=true");
        exit;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"] . "?success=false");
        exit;
    }
    $conn->close();
}
?>
// Close the database connection