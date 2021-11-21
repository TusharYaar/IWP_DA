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
        session_start();
        $_SESSION['email'] = $data["email"];
        $_SESSION['type'] = $data["type"];
        echo json_encode($data);

    }
   } else {
    echo "0 results";
   }
?>