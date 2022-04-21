<?php
session_start();
?>

<?php
require('../Database/Database.php');
if (isset($_POST['submitnewpassword'])) {
    $newpass = $_POST['newpassword'];
    $confirmnewpass = $_POST['confirmnewpassword'];
    $error = "";
    if (empty($newpass) || $confirmnewpass == "") {
        $error = 'All fields are required!';
    } else if ($_POST['newpassword'] != $_POST['confirmnewpassword']) {
        $error2 = 'Passwords do not match!';
    }
    if (empty($error || $error2)) {
        $query = "UPDATE users SET password= '$confirmnewpass' WHERE username='" . $_SESSION['username'] . "'";
        $result = mysqli_query($conn, $query);
        if ($query) {
            header('Location: ../../settings.php');
            $success = "Password changed sucessfully";
        } else {
            header('Location: ../../settings.php');
            $GLOBALS['test'] = 'greska bato';
        }
    }
}
