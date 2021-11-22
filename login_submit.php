<?php 
   include 'connect.php';
   $email = $_POST['email'];
   $password = $_POST['password'];
   $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data["email"] = $row['email'];
        $data["firstname"] = $row['firstname'];
        $data["lastname"] = $row['lastname'];
        $data["type"]= $row['type'];
        $data["success"] = true;
        session_start();
        $_SESSION['email'] = $data["email"];
        $_SESSION['type'] = $data["type"];
        $_SESSION['firstname'] = $data["firstname"];  
        }
    } else {
    $data["success"] = false;
    $data["message"] = "Invalid credentials";
}
echo json_encode($data);
?>