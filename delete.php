<?php

include './db_connect.php';

$id = $_GET['id'];
$imageName = $_GET['imageName'];

unlink("uploads/$imageName");

$sql = "DELETE FROM `contact` WHERE id = $id";

$conn->query($sql);

header('Location: show-contacts.php');
