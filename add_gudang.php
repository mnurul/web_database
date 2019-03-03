<?php
    include_once("config.php");
    
    $kota = mysqli_query($mysqli, "SELECT * 
                FROM kota order by kota_id desc");
?>

<html>
<head>
    <title>Add Gudang</title>
</head>

<body>
    <br><br>
    <a href="gudang.php" style="color:black;text-decoration:none;">Go to Gudang</a>
    <br/><br/>

    <form action="add_gudang.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Gudang</td>
                <td><input type="text" name="nama_gudang"></td>
            </tr>
            <tr> 
                <td>deskripsi</td>
                <td><input type="text" name="deskripsi"></td>
            </tr>
            <tr> 
                <td>Kota</td>
                <td>
                    <select name="kota" id="kota">
                    <option>Pilih Kota</option>
                        <?php
                            while($data_kota = mysqli_fetch_array($kota)){
                        ?>
                            <option value="<?php echo $data_kota['kota_id'] ?>">
                            <?php echo $data_kota['nama_kota']?></option>
                        <?php
                            }
                        ?>
                </td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama_gudang = $_POST['nama_gudang'];
        $deskripsi = $_POST['deskripsi'];
        $kota_id = $_POST['kota'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO gudang(nama_gudang,deskripsi,kota_id)
            VALUES('$nama_gudang','$deskripsi','$kota_id')");

        // Show message when user added
        echo "User added successfully. <a href='gudang.php'>View Users</a>";
    }
?>
</body>
</html>