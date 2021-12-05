<?php 
    session_start();
   include 'connect.php';
   $message = $_POST['message'];
    $name = $_SESSION['firstname'];
    $email = $_SESSION['email'];

   if (!isset($_POST['message']) || !isset($_SESSION["email"])) {
    $data["success"] = false;
    $data["message"] = "Incomple details or user not logged in";
   } else {
       $sql = "INSERT INTO feedbacks (user,email, message) VALUES ('$name','$email' , '$message')";
   	$result = mysqli_query($conn, $sql);
   	if ($result) {
        $data["success"] = true;
        $data["message"] = "Feedback Sent";
   	} else {
        $data["success"] = false;
        $data["message"] = "Error Adding Feedback";
   	}
   }

echo json_encode($data);
?>