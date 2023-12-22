<?php
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Prepare SQL statement to insert data
  $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

  if ($conn->query($sql) === TRUE) {
    header("Location: " . $_SERVER["HTTP_REFERER"] . "?success=true");
  } else {
    header("Location: " . $_SERVER["HTTP_REFERER"] . "?success=false");
  }
  $conn->close();
}
