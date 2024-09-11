<?php

include '../db_connect.php';

$data = file_get_contents('php://input');


$data = json_decode($data);

$sql = "INSERT INTO `users`(`name`, `email`) VALUES ('$data->name','$data->email')";

$conn->query($sql);

echo json_encode(['result' => 'success', 'response' => 'data saved into the database']);
