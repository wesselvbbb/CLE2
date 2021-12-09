<?php

// General settings
$host       = "localhost";
$database   = "cle_reservation";
$user       = "root";
$password   = "";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;

try {
    //New DB connection
    $db = new mysqli($host, $user, $password, $database );

} catch (Exception $e) {
    //Set error
    $error = "Oops, try to fix your error please: " .
        $e->getMessage() . " on line " . $e->getLine() . " of " .
        $e->getFile();


}
