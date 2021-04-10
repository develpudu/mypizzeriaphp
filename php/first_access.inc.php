<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('../resources/functions.php');
$arrayconf = array(
    'CONFIG' => array(
        'site' => $_POST["site"],
        'hostname' => $_POST["hostname"],
        'user' => $_POST["user"],
        'password' => $_POST["password"],
        'dbname' => $_POST["dbname"]
    ),
    'INFO' => array(
        'name' => $_POST["name"],
        'ntables' => 30,
        'tax' => 5,
        'cover' => 2
    ),
    'LANG' => array(
        'language' => $_POST["lang"]
    ),
    'LOOKNFEEL' => array(
        'theme' => $_POST["style"]
    )
);

$conn = mysqli_connect($_POST["hostname"], $_POST["user"], $_POST["password"]);

if(!$conn) {
    header('Location: ../errors/db.php');
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//query drop db
$sqldb = "DROP DATABASE IF EXISTS " . $_POST["dbname"] . ";";
$result = $conn->query($sqldb);
echo '[OK] Se borro la base de datos' . PHP_EOL;

//query db creation
$sqldb = "CREATE DATABASE " . $_POST["dbname"] . ";";
$result = $conn->query($sqldb);
echo '[OK] Se creo la base de datos' . PHP_EOL;

//query db selection
$sqldb = "USE " . $_POST["dbname"] . ";";
$result = $conn->query($sqldb);
echo '[OK] Se selecciono la base de datos' . PHP_EOL;

// query db data
$sqldb = file_get_contents(__DIR__ . '/../resources/sampleDB.sql');
if ($conn->multi_query($sqldb)) {
    do {
        /* almacenar primer juego de resultados */
        if ($result = $conn->store_result()) {
            $result->free();
        }
        /* mostrar divisor */
        if ($conn->more_results()) {
            echo '[OK] Se insertaron los datos' . PHP_EOL;
        }
    } while ($conn->next_result());
}

// query insert admin account
$password = md5($_POST['usrpassword']);
$sqlinsert =
    "INSERT INTO `users` (`name`, `surname`, `username`, `psw`, `level`) VALUES
        ('" . $_POST['usrname'] . "', '" . $_POST['usrsurname'] . "', '" . $_POST['usrusername'] . "', '" . $password . "', 0);";
$resultsqlinsert = $conn->query($sqlinsert);
echo '[OK] Se creo la cuenta admin' . PHP_EOL;

//automated delete query
if ($_POST['querycheck'] == true) {
    $sqlevent = "CREATE DEFINER=CURRENT_USER EVENT delete_event ON SCHEDULE EVERY 15 MINUTE STARTS CURRENT_TIMESTAMP() ON COMPLETION NOT PRESERVE ENABLE
	DO
   	DELETE FROM orders WHERE timestamp < DATE_SUB(NOW(), INTERVAL 90 MINUTE);";
    $resultevent = $conn->query($sqlevent);
    echo '[OK] Se creo el evento automatico' . PHP_EOL;
}

//write into ini file
write_php_ini($arrayconf, '../config.ini');
header('Location: ../');