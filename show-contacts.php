<?php

include './db_connect.php';

$sql = 'SELECT * FROM contact';

$result = $conn->query($sql);

?>

<?php include './includes/header.php' ?>

<div class="container">

    <h3 class="mt-5">All Contacts</h3>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <th><?php echo $row['name'] ?></th>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['subject'] ?></td>
                    <td><?php echo $row['message'] ?></td>
                    <td><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">EDIT</a> <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">DELETE</a></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>

<?php include './includes/footer.php' ?>