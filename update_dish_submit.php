<?php
    include 'connect.php';

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $id = $_POST['id'];


    $sql = "UPDATE dishes SET name='$name', description='$description', price='$price', category='$category' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $data["success"] = true;
        $data["message"] = "Dish updated successfully";
    } else {
        $data["success"] = false;
        $data["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }
    echo json_encode($data);

?>