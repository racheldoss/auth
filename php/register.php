<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods", "GET, POST, PUT");
header("Access-Control-Allow-Headers", "Content-Type");
$servername = "localhost"; 
$username = "root"; 
$password = "Root@123"; 
$dbname = "test"; 
 
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
 
// Check connection 
if ($conn->connect_error) { 
  die("Connection failed: " . $conn->connect_error); 
} 
 
// Get user input from AJAX call 
$name = $_POST["name"]; 
$email = $_POST["email"]; 
$password = $_POST["password"]; 
 
// Hash the password for security 
$hashed_password = password_hash($password, PASSWORD_DEFAULT); 
 
// Prepare SQL statement with prepared statement to prevent SQL injection 
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)"); 
$stmt->bind_param("sss", $name, $email, $hashed_password); 
 
// Execute prepared statement and check for errors 
if ($stmt->execute() === TRUE) { 
  echo "User registered successfully"; 
} else { 
  echo "Error: " . $stmt->error; 
} 
 
// Close prepared statement and database connection 
$stmt->close(); 
$conn->close(); 
?>