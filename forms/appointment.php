<?php
// Database connection code (replace placeholders with actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproj";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $date = $_POST["date"];
  $department = $_POST["department"];
  $doctor = $_POST["doctor"];
  $message = $_POST["message"];

  // Prepare SQL query to insert data into appointments table
  $sql = "INSERT INTO appointments (name, email, phone, date, department, doctor, message) VALUES ('$name', '$email', '$phone', '$date', '$department', '$doctor', '$message')";

  // Execute SQL query
  if ($conn->query($sql) === TRUE) {
    header("Location: " . $_SERVER["HTTP_REFERER"] . "?Appsuccess=true");
  } else {
    header("Location: " . $_SERVER["HTTP_REFERER"] . "?Appsuccess=false");
  }
  $conn->close();
}
?>
// Close the database connection