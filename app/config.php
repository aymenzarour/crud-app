<?php

/* Attempt to connect to MySQL database */
$link = mysqli_connect(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASS"), getenv("DB_NAME"));

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
