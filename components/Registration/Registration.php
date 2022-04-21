<?php
session_start();
?>

<?php

error_reporting(E_ALL & ~E_NOTICE ^ E_DEPRECATED);
?>

<?php


if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $usernameERROR = "";
    $emailERROR = "";
    $passwordERROR = "";

    if (empty($username) || $username == "") {
        $usernameERROR = "Username cannot be empty!";
        echo "<script>
				alert('Greska: $usernameERROR');
				window.location.assign('../../registration.php');
				</script>";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $usernameERROR = "Only letters and white space allowed!";
            echo "<script>
				alert('Username error: $usernameERROR');
				window.location.assign('../../registration.php');
				</script>";
        }
        require('../Database/Database.php');
        $sql = "SELECT * FROM users WHERE username='" . $username . "'";
        $x = mysqli_query($conn, $sql);
        if (mysqli_num_rows($x) == 1) {

            $usernameERROR = "Username already taken, choose another!";
            echo "<script>
				alert('$usernameERROR');
				window.location.assign('../../registration.php');
				</script>";
        }
    }

    if (empty($email) || $email == "") {
        $emailERROR = "Email cannot be empty!";
        echo "<script>
				alert('$emailERROR');
				window.location.assign('../../registration.php');
				</script>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailERROR = "Check email format!";
            echo "<script>
				alert('E-mail error: $emailERROR');
				window.location.assign('../../registration.php');
				</script>";
        }
        require('../Database/Database.php');
        $sql = "SELECT * FROM users WHERE email='" . $email . "'";
        $x = mysqli_query($conn, $sql);
        if (mysqli_num_rows($x) == 1) {

            $emailERROR = "email already taken, choose another!";
            echo "<script>
				alert('$emailERROR');
				window.location.assign('../../registration.php');
				</script>";
        }
    }

    if (empty($password) || $password == "") {
        $passwordERROR = "password cannot be empty!";
        echo "<script>
				alert('Password error: $passwordERROR');
				window.location.assign('../../registration.php');
				</script>";
    }

    if (empty($usernameERROR) && empty($emailERROR) && empty($passwordERROR)) {
        require('../Database/Database.php');

        $x = mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES('" . $username . "', '" . $email . "', '" . $password . "')");
        if ($x) {
            $_SESSION['username'] = $username;
            header('Location: ../../index.php');
        } else {
            header('Location: ../../login.php');
        }
    }
} else {
    echo '<div class="alert alert-danger">
	  				      <strong>Error message:</strong> Neuspela konekcija sa bazom.
					  </div>';
}


?>