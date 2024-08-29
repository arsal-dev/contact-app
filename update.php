<?php

include './db_connect.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $sql = "UPDATE `contact` SET `name`='$name',`email`='$email',`subject`='$subject',`message`='$message' WHERE id = $id";

    $conn->query($sql);

    header('Location: show-contacts.php');
}
