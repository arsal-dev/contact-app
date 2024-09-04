<?php

include './db_connect.php';

$login = false;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT `password` FROM `users` WHERE `email` = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $db_password = $result->fetch_assoc();
        $db_password = $db_password['password'];

        if (password_verify($password, $db_password)) {

            session_start();

            $_SESSION['login'] = true;


            header('Location: index.php');
        } else {
            $login = true;
        }
    } else {
        $login = true;
    }
}


?>

<?php include './includes/header.php' ?>


<div class="container mt-5">

    <?php if ($login): ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error!</h4>
            Your Email Or Password is Incorrect
        </div>
    <?php endif ?>

    <h3>Login</h3>
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