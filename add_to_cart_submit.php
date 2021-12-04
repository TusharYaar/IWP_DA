<?php session_start(); 

    include 'connect.php';

    $id = $_POST['id'];

    if(!isset($_SESSION["firstname"])){
        $data["success"] = false;
        $data["message"] = "Error: Please Login First";
    }

    else {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], $id);

    $data["success"] = true;
    $data["message"] = "Successfully added to cart";
    
}
    echo json_encode($data);
?>