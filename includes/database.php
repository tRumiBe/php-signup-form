<?php

$host = "localhost";
$dbname = "membership";
$dbusername = "root";
$dbpassword = "root";

// mysqli must be in this order. 
$mysqli = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check database connection. 
if ($mysqli->connect_errno) {
    // die("Connection error: " . $mysqli->connect_errno);

    error_log("Connection error: " . $mysqli->connect_errno);
    echo "An error occurred while connecting to the database.";
    exit;
}

return $mysqli;