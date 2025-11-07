<?php
    $host ='localhost';
    $db = 'u941347256_cafemendoza';
    $user = 'u941347256_mendoza';
    $pass = '0007Luis';

    $con = new mysqli($host, $user, $pass, $db);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }  
?>
