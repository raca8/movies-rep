<?php
$host = "localhost";
$server_username = "root";
$server_pass = "";
$base = "movies";
$conn = mysqli_connect($host,$server_username, $server_pass,$base);

if (!$conn) {
    die("Neuspesno konektovani: " . mysqli_connect_error());
}

?>