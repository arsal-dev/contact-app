<?php

include './db_connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM `contact` WHERE id = $id";

$result = $conn->query($sql);

$result = $result->fetch_assoc();

?>

<?php include './includes/header.php' ?>

<div class="container">
    <h3 class="mt-5">Edit Data</h3>
    <form action="./update.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">

        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name" value="<?php echo $result['name'] ?>">
            </div>
            <div class="col-lg-6 col-sm-12">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email" value="<?php echo $result['email'] ?>">
            </div>
        </div>
        <div>
            <label for="subject">Subject</label>
            <input type="subject" id="subject" name="subject" class="form-control" placeholder="Enter Your Subject" value="<?php echo $result['subject'] ?>">
        </div>
        <div>
            <label for="message">Message</label>
            <textarea id="message" rows="7" name="message" class="form-control" placeholder="Enter Your Message"><?php echo $result['message'] ?></textarea>
        </div>
        <input type="submit" value="update" name="submit" class="btn btn-primary mt-3">
    </form>
</div>

<?php include './includes/footer.php' ?>