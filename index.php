<?php
    // Create database connection using config file
    include_once("config.php");

    // Fetch all users data from database
    $result = mysqli_query($mysqli, "SELECT 
                a.barang_id,a.nama_barang,a.qty,a.satuan,
                b.nama_tipe,
                c.nama_gudang 
                from barang a 
                LEFT join tipe b 
                on a.tipe_id = b.tipe_id 
                LEFT JOIN gudang c 
                ON a.gudang_id = c.gudang_id 
                order by a.barang_id ASC");
?>

<html>
<head>    
    <title>Barang</title>
</head>

<body>
    <br><br>
    <a href="gudang.php" style="margin-left:135px;color:black;text-decoration:none;">Gudang | </a>
    <a href="tipe.php" style="margin-left:5px;color:black;text-decoration:none;">Tipe</a><br><br>
    <a href="add.php" style="margin-left:135px;color:black;text-decoration:none;">Add New Barang</a><br/><br/>
        <center>
            <table width='80%' border=1 >
            <tr>
                <th>Barang_id</th> 
                <th>Nama_barang</th> 
                <th>Qty</th> 
                <th>Satuan</th>
                <th>Tipe</th>
                <th>Gudang</th>
                <th>Aksi</th>
            </tr>
            <?php  
                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['barang_id']."</td>";
                    echo "<td>".$user_data['nama_barang']."</td>";
                    echo "<td>".$user_data['qty']."</td>";
                    echo "<td>".$user_data['satuan']."</td>";
                    echo "<td>".$user_data['nama_tipe']."</td>";
                    echo "<td>".$user_data['nama_gudang']."</td>";
                    echo "<td><a href='edit.php?barang_id=$user_data[barang_id]'>Edit</a> | 
                            <a href='delete.php?barang_id=$user_data[barang_id]' onClick='myFunction()'>Delete
                            </a></td></tr>";        
                }
            ?>
            </table>
        </center>
    <script>
        function myFunction() {
        confirm("Are you sure DELETE in data ? ");
        }
    </script>
</body>
</html>