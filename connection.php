<?php

$serverName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'houseDb';

$conn = mysqli_connect('$serverName','$userName','$password','$databaseName');
/*
if ($conn->connect_error) {
    die("Connection failure: " 
        . $conn->connect_error);
} 
else{
    echo 'connection succesfull';
}*/
?>