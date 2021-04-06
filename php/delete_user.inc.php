<?php
require('connect.inc.php'); //orderdel
$id = $_POST['id'];
$sql = 'DELETE FROM users WHERE id=' . $id;

if ($conn->query($sql)) {
    header('Location: ../users.php');
} else
    header('Location: ../errors/db.php');
$conn->close();
