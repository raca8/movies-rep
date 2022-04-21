<?php
$host = "localhost";
$server_username = "root";
$server_pass = "";
$base = "movies";
$conn = mysqli_connect($host,$server_username, $server_pass,$base);

if (!$conn) {
    die("Neuspesno konektovani: " . mysqli_connect_error());
}


$upit = "SELECT id, username FROM users WHERE username = '" . $_SESSION['username'] . "'";
$result23 = mysqli_query($conn,$upit);
$row = mysqli_fetch_array($result23);
$GLOBALS['idGlobal']=$row['id'];
$GLOBALS['usernameGlobal']=$row['username'];


?>