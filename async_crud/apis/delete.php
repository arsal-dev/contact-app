<?php

include '../db_connect.php';

$data = file_get_contents('php://input');
$sql = "DELETE FROM `users` WHERE id = $data";

if ($conn->query($sql)) {
    echo json_encode(['result' => 'success', 'response' => 'data deleted from the database']);
} else {
    echo json_encode(['result' => 'error', 'response' => 'there was an error deleting data to the database']);
}
