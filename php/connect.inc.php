<?php
$ini = file_get_contents("../config.ini", true);
$array = parse_ini_string($ini, true);

$servername = $array['CONFIG']['hostname'];
$dBUsername = $array['CONFIG']['user'];
$dBPassword = $array['CONFIG']['password'];
$dBName = $array['CONFIG']['dbname'];

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn)
	header('Location: ../errors/db.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* cambiar el conjunto de caracteres a utf8 */
if (!$conn->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
    exit();
} 
?>