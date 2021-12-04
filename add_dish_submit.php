<?php
    include 'connect.php';

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];


    $sql = "INSERT INTO dishes (name, description, price, category) VALUES ('$name', '$description', '$price', '$category')";

    if ($conn->query($sql) === TRUE) {
        $data["success"] = true;
        $data["message"] = "Dish added successfully";
    } else {
        $data["success"] = false;
        $data["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }
    echo json_encode($data);


?>