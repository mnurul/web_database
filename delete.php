<?php
    // include database connection file
    include_once("config.php");
    
    // Get id from URL to delete that user
    $barang_id = $_GET['barang_id'];

    // Delete user row from table based on given id
    $result = mysqli_query($mysqli, "DELETE FROM barang WHERE barang_id=$barang_id");

    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:index.php");
?>