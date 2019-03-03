<?php
    // include database connection file
    include_once("config.php");

    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update']))
    {   
        $tipe_id = $_POST['id'];
        $nama_tipe = $_POST['nama_tipe'];

        // update user data
        $result = mysqli_query($mysqli, "UPDATE tipe
            SET nama_tipe='$nama_tipe' 
            WHERE tipe_id=$tipe_id");

        // Redirect to homepage to display updated user in list
        header("Location: tipe.php");
    }
?>
<?php
    // Display selected user data based on id
    // Getting id from url
    $tipe_id = $_GET['tipe_id'];

    // Fetech user data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM tipe WHERE tipe_id=$tipe_id");

    while($user_data = mysqli_fetch_array($result))
    {
        $nama_tipe = $user_data['nama_tipe'];
    }
?>
<html>
<head>  
    <title>Edit Tipe Data</title>
</head>
<body>
    <br><br>
    <a href="tipe.php" style="color:black;text-decoration:none;">Go to Tipe</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit_tipe.php">
        <table border="0">
            <tr> 
                <td>Nama tipe</td>
                <td><input type="text" name="nama_tipe" value="<?php echo $nama_tipe;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['tipe_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>