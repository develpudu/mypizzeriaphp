<?php
session_start();
require('connect.inc.php');
$refid_user = $_SESSION['logged-id'];
$amount = $_POST['amount'];

$sql = "INSERT INTO cash (refid_user, amount,timestamp) VALUES ('" . $refid_user . "', '" . $amount . "',CURRENT_TIMESTAMP);";
$sql .= 'DELETE FROM c_orders WHERE table_number=' . $_POST['tn'] . ';';

if ($conn->multi_query($sql)) {
    header('Location: ../bill/');
} else {
    header('Location: ../errors/db.php');
}
