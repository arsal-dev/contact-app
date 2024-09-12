<?php

include '../db_connect.php';

$sql = "SELECT * FROM `users`";

$result = $conn->query($sql);

$result_arr = [];

while ($row = $result->fetch_assoc()) {
    array_push($result_arr, $row);
}


$result = json_encode($result_arr);

echo json_encode(['result' => 'success', 'response' => $result_arr]);
