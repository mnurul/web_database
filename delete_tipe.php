<?php
    // include database connection file
    include_once("config.php");

    // Get id from URL to delete that user
    $tipe_id = $_GET['tipe_id'];

    // Delete user row from table based on given id
    $result = mysqli_query($mysqli, "DELETE FROM tipe WHERE tipe_id=$tipe_id");

    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:tipe.php");
?>