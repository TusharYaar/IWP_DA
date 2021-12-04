<?php session_start(); 


    $id = $_POST['id'];

    if(!isset($_SESSION["firstname"])) {
        $data["success"] = false;
        $data["message"] = "Error: Please Login First";
    }
    else {
    if (($key = array_search($id, $_SESSION['cart'])) !== false) {
        array_splice($_SESSION['cart'], $key, 1);
        $data["success"] = true;
        $data["message"] = "Successfully removed to cart";
    
    }
    else {
        $data["success"] = false;
        $data["message"] = "Error: Item not in cart";
    }
}
    echo json_encode($data);
?>