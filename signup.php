<?php
    include 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "INSERT INTO users (password, email, firstname, lastname) VALUES ('$password', '$email', '$firstname', '$lastname')";

    if ($conn->query($sql) === TRUE) {
        $data["success"] = true;
        $data["message"] = "New record created successfully";
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['type'] = "default";
    } else {
        $data["success"] = false;
        $data["message"] = $conn->error;
    }
    echo json_encode($data);
?>