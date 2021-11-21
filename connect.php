 <?php
$servername = "localhost";
$username = "tushar";
$password = "password";
$dbname = "theory_da";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>