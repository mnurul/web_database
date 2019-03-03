<?php
    // include database connection file
    include_once("config.php");

    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update']))
    {   
        $gudang_id = $_POST['id'];
        $nama_gudang = $_POST['nama_gudang'];
        $deskripsi = $_POST['deskripsi'];
        $kota_id = $_POST['kota'];

        // update user data
        $result = mysqli_query($mysqli, "UPDATE gudang
            SET nama_gudang='$nama_gudang',deskripsi='$deskripsi',kota_id='$kota_id' 
            WHERE gudang_id=$gudang_id");

        // Redirect to homepage to display updated user in list
        header("Location: gudang.php");
    }
?>
<?php
    // Display selected user data based on id
    // Getting id from url
    $gudang_id = $_GET['gudang_id'];

    // Fetech user data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM gudang WHERE gudang_id=$gudang_id");

    $kota = mysqli_query($mysqli, "SELECT * 
                    FROM kota order by kota_id desc");

    while($user_data = mysqli_fetch_array($result))
    {
        $nama_gudang = $user_data['nama_gudang'];
        $deskripsi = $user_data['deskripsi'];
        $kota_id = $user_data['kota_id'];
    }
?>

<html>
<head>  
    <title>Edit Gudang Data</title>
</head>

<body>
    <br><br>
    <a href="gudang.php" style="color:black;text-decoration:none;">Go to Gudang</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit_gudang.php">
        <table border="0">
            <tr> 
                <td>Nama gudang</td>
                <td><input type="text" name="nama_gudang" value="<?php echo $nama_gudang;?>"></td>
            </tr>
            <tr> 
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" value=<?php echo $deskripsi;?>></td>
            </tr>
            <tr> 
                <td>Kota</td>
                <td>
                    <select id='kota' name='kota'>
                        <?php
                            while($data_kota = mysqli_fetch_array($kota)){
                        ?>
                            <option value="<?php echo $data_kota['kota_id'] ?>"
                            <?php
                            if($data_kota['kota_id'] === $kota){
                                echo 'selected = "selected"';
                            }
                            ?>
                            >
                            <?php echo $data_kota['nama_kota']?>  
                        <?php
                            }
                        ?>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['gudang_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>