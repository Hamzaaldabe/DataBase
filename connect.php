<?php

	$dsn = 'mysql:host=localhost;dbname=dynometer';
	$user = 'root';
	$pass = '';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

try {
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
}

catch(PDOException $e) {
    echo 'Failed To Connect' . $e->getMessage();
}