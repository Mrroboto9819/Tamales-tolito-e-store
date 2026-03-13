<?php
$servername = "localhost";
$database = "id13419638_users";
$username = "id13419638_tolito_users";
$password = "^==?T^=]%Gp[\kX7";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
