<?php
    // include database connection file
    include_once("config.php");

    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update']))
    {   
        $barang_id = $_POST['id'];
        $nama_barang = $_POST['nama_barang'];
        $qty = $_POST['qty'];
        $satuan = $_POST['satuan'];
        $tipe_id = $_POST['tipe'];
        $gudang_id = $_POST['gudang'];

        // update user data
        $result = mysqli_query($mysqli, "UPDATE barang
            SET nama_barang='$nama_barang',qty='$qty',satuan='$satuan',
            tipe_id=$tipe_id,gudang_id=$gudang_id WHERE barang_id=$barang_id");

        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    }
?>
<?php
    // Display selected user data based on id
    // Getting id from url
    $barang_id = $_GET['barang_id'];

    // Fetech user data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM barang WHERE barang_id=$barang_id");

    $tipe = mysqli_query($mysqli, "SELECT * 
                    FROM tipe order by tipe_id desc");

    $gudang = mysqli_query($mysqli, "SELECT * 
                    FROM gudang order by gudang_id desc");

    while($user_data = mysqli_fetch_array($result))
    {
        $nama_barang = $user_data['nama_barang'];
        $qty = $user_data['qty'];
        $satuan = $user_data['satuan'];
        $tipe_id = $user_data['tipe_id'];
        $gudang_id = $user_data['gudang_id'];
    }
?>
<html>
<head>  
    <title>Edit Barang Data</title>
</head>

<body>
    <br><br>
    <a href="index.php" style="color:black;text-decoration:none;">Go to Barang</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="nama_barang" value="<?php echo $nama_barang;?>"></td>
            </tr>
            <tr> 
                <td>Qty</td>
                <td><input type="text" name="qty" value=<?php echo $qty;?>></td>
            </tr>
            <tr> 
                <td>Satuan</td>
                <td><input type="text" name="satuan" value=<?php echo $satuan;?>></td>
            </tr>
            <tr> 
                <td>Tipe</td>
                <td>
                    <select id='tipe' name='tipe'>
                        <?php
                            while($data_tipe = mysqli_fetch_array($tipe)){
                        ?>
                            <option value="<?php echo $data_tipe['tipe_id'] ?>"
                            <?php
                            if($data_tipe['tipe_id'] === $tipe_id){
                                echo 'selected = "selected"';
                            }
                            ?>
                            >
                            <?php echo $data_tipe['nama_tipe']?>       
                        <?php
                            }
                        ?>
                </td>
            </tr>
            <tr> 
                <td>Gudang</td>
                <td>
                    <select id='gudang' name='gudang'>
                        <?php
                            while($data_gudang = mysqli_fetch_array($gudang)){
                        ?>      
                            <option value="<?php echo $data_gudang['gudang_id'] ?>"
                            <?php
                            if($data_gudang['gudang_id'] === $gudang_id){
                                echo 'selected = "selected"';
                            }
                            ?>
                            >
                            <?php echo $data_gudang['nama_gudang']?>
                                
                        <?php
                            }
                        ?>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['barang_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>