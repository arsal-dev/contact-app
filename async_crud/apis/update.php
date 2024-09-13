<?php

include '../db_connect.php';

$data = file_get_contents('php://input');


$data = json_decode($data);

$sql = "UPDATE `users` SET `name`='$data->name',`email`='$data->email' WHERE id = $data->id";

if ($conn->query($sql)) {
    echo json_encode(['result' => 'success', 'response' => 'data saved into the database']);
} else {
    echo json_encode(['result' => 'error', 'response' => 'there was an error adding data to the database']);
}
