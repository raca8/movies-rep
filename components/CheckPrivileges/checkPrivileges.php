
<?php
$host = "localhost";
$server_username = "root";
$server_pass = "";
$base = "movies";
$conn = mysqli_connect($host,$server_username, $server_pass,$base);

if (!$conn) {
    die("Neuspesno konektovani: " . mysqli_connect_error());
}


$sql = "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "' AND access_level=1";
    if (mysqli_connect($host, $server_username, $server_pass, $base))

        $x = mysqli_query($conn, $sql);

    if (mysqli_num_rows($x) == 1) {
        $GLOBALS['isAdmin'] = 'Admin';
    }
    else{
        $GLOBALS['isAdmin'] = 'User';
    }
?>