<?php
session_start();
require('connect.inc.php');

$refid_user = $_SESSION['logged-id'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$table_number = $_POST['table_number'];
$edits = $_POST['edits'];

$sql = 'INSERT INTO orders(refid_user,refid_menu,quantity,table_number,edits) 
VALUES('.$refid_user.','.$name.','.$quantity.','.$table_number.',"'.$edits.'");';

if ($conn->query($sql))
    header('Location: ../serve/');
else
    header('Location: ../errors/db.php');
$conn->close();