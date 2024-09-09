<?php

include './db_connect.php';

$signup = false;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users`(`email`, `password`) VALUES ('$email','$hashed_password')";

    if ($conn->query($sql)) {
        $signup = true;
    }
}


?>

<?php include './includes/header.php' ?>


<div class="container mt-5">

    <?php
    if ($signup) {
        echo "<div class='alert alert-success' role='alert'>Data saved into the database you can now login <a href='./login.php'>Login</a></div>";
    }
    ?>

    <h3>Signup</h3>
    <form action="" method="POST">
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter Your password">
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-3">
    </form>
</div>

<?php include './includes/footer.php' ?>