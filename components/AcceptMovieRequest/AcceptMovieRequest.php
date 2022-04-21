<?php


if (isset($_POST['odobri'])) {

    $movieID = $_POST['movieID'];

    require('../Database/Database.php');
    $update_query = "UPDATE movies SET isRequested = 0, isAccepted = 1 WHERE id='" . $movieID . "'";
    mysqli_query($conn, $update_query);
    header("Location: ../../movieRequests.php");
    exit();
}
