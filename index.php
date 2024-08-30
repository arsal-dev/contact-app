<?php

include './db_connect.php';

$errors = [];
$checkError = true;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $fileName = $_FILES['image']['full_path'];
    $fileSize = $_FILES['image']['size'];
    $filePath = $_FILES['image']['tmp_name'];
    $fileActualName = $_FILES['image']['name'];

    $fileActualName = explode('.', $fileActualName)[0];

    $fileExtention = pathinfo($fileName, PATHINFO_EXTENSION);

    $newFileName = uniqid() . '.' . $fileActualName . '.' . $fileExtention;

    $allowdExtenstions = ['png', 'jpg', 'jpeg', 'webp', 'svg', 'gif'];
    $image_bool = true;

    if (!in_array($fileExtention, $allowdExtenstions)) {
        $errors['fileError'] = 'This file is not Supported please upload png, jpg, jpeg, webp, svg or gif';
        $image_bool = true;
    } else {
        $image_bool = false;
    }
    if ($fileSize > 5000000) {
        $errors['fileError'] = 'Image size cannot be grater then 5 MB';
        $image_bool = true;
    } else {
        $image_bool = false;
    }
    if (empty($name)) {
        $errors['name'] = 'Please Enter Your Name';
        $checkError = true;
    } else {
        $checkError = false;
    }
    if (empty($email)) {
        $errors['email'] = 'Please Enter Your Email';
        $checkError = true;
    } else {
        $checkError = false;
    }
    if (empty($subject)) {
        $errors['subject'] = 'Please Enter Your Subject';
        $checkError = true;
    } else {
        $checkError = false;
    }
    if (empty($message)) {
        $errors['message'] = 'Please Enter Your Message';
        $checkError = true;
    } else {
        $checkError = false;
    }

    if ($checkError == false && $image_bool == false) {

        move_uploaded_file($filePath, "uploads/$newFileName");

        $sql = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`, `image`) VALUES ('$name','$email','$subject','$message', '$newFileName')";

        if ($conn->query($sql)) {
            $checkError = false;
        } else {
            $checkError = true;
            $errors['database'] = 'data could not be saved into the databse please contact system administrator';
        }
    }
}

?>

<?php include './includes/header.php' ?>
<div class="container mt-5">
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <?php
    if ($checkError == false && $image_bool == false) {
        echo "<div class='alert alert-success' role='alert'>We have Recived Your Message and we'll get back to you shortly</div>";
    }
    ?>

    <h3>Contact Us</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name" value="<?php echo $name ?? "" ?>">
            </div>
            <div class="col-lg-6 col-sm-12">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email" value="<?php echo $email ?? "" ?>">
            </div>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div>
            <label for="subject">Subject</label>
            <input type="subject" id="subject" name="subject" class="form-control" placeholder="Enter Your Subject" value="<?php echo $subject ?? "" ?>">
        </div>
        <div>
            <label for="message">Message</label>
            <textarea id="message" rows="7" name="message" class="form-control" placeholder="Enter Your Message"><?php echo $message ?? "" ?></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-3">
    </form>
</div>
<?php include './includes/footer.php' ?>