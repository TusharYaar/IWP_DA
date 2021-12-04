<?php session_start(); 
    include 'connect.php';
    $sql = "SELECT * FROM dishes";
    $result = $conn->query($sql);
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $data['success'] = true;
    $data['dishes'] = $rows;
    $data["cart"] = $_SESSION["cart"];
        echo json_encode($data);
?>