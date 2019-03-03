<?php
    // include database connection file
    include_once("config.php");

    // Get id from URL to delete that user
    $gudang_id = $_GET['gudang_id'];

    // Delete user row from table based on given id
    $result = mysqli_query($mysqli, "DELETE FROM gudang WHERE gudang_id=$gudang_id");

    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:gudang.php");
?>