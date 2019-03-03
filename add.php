<?php
    include_once("config.php");
    
    $tipe = mysqli_query($mysqli, "SELECT * 
                FROM tipe order by tipe_id desc");
    $gudang = mysqli_query($mysqli, "SELECT * 
                FROM gudang order by gudang_id desc");
?>

<html>
<head>
    <title>Add Barang</title>
</head>

<body>
    <br><br>
    <a href="index.php" style="color:black;text-decoration:none;">Go to Barang</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr> 
                <td>Qty</td>
                <td><input type="text" name="qty"></td>
            </tr>
            <tr> 
                <td>Satuan</td>
                <td><input type="text" name="satuan"></td>
            </tr>
            <tr> 
                <td>Tipe</td>
                <td>
                    <select name="tipe" id="tipe">
                    <option>Pilih Tipe</option>
                        <?php
                            while($data_tipe = mysqli_fetch_array($tipe)){
                        ?>
                            <option value="<?php echo $data_tipe['tipe_id'] ?>">
                            <?php echo $data_tipe['nama_tipe']?></option>
                        <?php
                            }
                        ?>
                </td>
            </tr>
            <tr> 
                <td>Gudang</td>
                <td>
                    <select name="gudang" id="gudang">
                    <option>Pilih Gudang</option>
                        <?php
                            while($data_gudang = mysqli_fetch_array($gudang)){
                        ?>
                            <option value="<?php echo $data_gudang['gudang_id'] ?>">
                            <?php echo $data_gudang['nama_gudang']?></option>
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
        $nama_barang = $_POST['nama_barang'];
        $qty = $_POST['qty'];
        $satuan = $_POST['satuan'];
        $tipe_id = $_POST['tipe'];
        $gudang_id = $_POST['gudang'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO barang(nama_barang,qty,satuan,tipe_id,gudang_id) 
            VALUES('$nama_barang','$qty','$satuan','$tipe_id','$gudang_id')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
?>
</body>
</html>