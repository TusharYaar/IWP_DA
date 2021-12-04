<?php session_start(); 

    include 'connect.php';

    $id = $_POST['id'];

    if(!isset($_SESSION["firstname"])){
        $data["success"] = false;
        $data["message"] = "Error: Please Login First";
    }

    else{


    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }


    if ($conn->query($sql) === TRUE) {
        $data["success"] = true;
        $data["message"] = "Dish updated successfully";
    } else {
        $data["success"] = false;
        $data["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }
}
    echo json_encode($data);
?>