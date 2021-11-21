<?php
    include 'connect.php';

    $search = $_GET['search'];
    echo $search;

    $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    
    
    var_dump($result);
    $queryResult = mysqli_num_rows($result);
    
    echo "There are ".$queryResult." results!";
    echo json_encode($result);

?>