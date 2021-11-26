<?php
    include 'connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM dishes WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $data["success"] = true;
        $data["message"] = "Dish deleted successfully";
    } else {
        $data["success"] = false;
        $data["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }
    echo json_encode($data);

?>