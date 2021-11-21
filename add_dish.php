<?php
    include 'connect.php';

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];


    $sql = "INSERT INTO dishes (name, description, price, category) VALUES ('$name', '$description', '$price', '$category')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>