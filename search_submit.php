<?php
    include 'connect.php';

    $search = $_GET['search'];
    $sql = "SELECT * FROM dishes WHERE name LIKE '%$search%'";
   $result = $conn->query($sql);
if ($result !== false && $result->num_rows > 0) {
   $rows = array();
   while($row = $result->fetch_assoc()) {
       $rows[] = $row;
   }
   $data['success'] = true;
   $data['dishes'] = $rows;
} else {
    $data["success"] = false;
    $data["message"] = $conn->error;
}
echo json_encode($data);
?>