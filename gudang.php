<?php
    // Create database connection using config file
    include_once("config.php");

    // Fetch all users data from database
    $result = mysqli_query($mysqli, "SELECT 
                a.gudang_id,a.nama_gudang,a.deskripsi,b.kota_id
                from gudang a 
                LEFT join kota b 
                on a.kota_id = b.kota_id  
                order by a.gudang_id ASC");
?>

<html>
<head>    
    <title>Gudang</title>
</head>

<body>
    <br><br>
    <a href="index.php" style="margin-left:135px;color:black;text-decoration:none;">Barang | </a>
    <a href="tipe.php" style="margin-left:5px;color:black;text-decoration:none;">Tipe</a><br><br>
    <a href="add_gudang.php" style="margin-left:135px;color:black;text-decoration:none;">Add New Gudang</a><br/><br/>
    <center>
        <table width='80%' border=1>

        <tr>
            <th>Gudang_id</th> 
            <th>Nama_gudang</th> 
            <th>Deskripsi</th> 
            <th>Kota_id</th>
            <th>Aksi</th>
        </tr>
        <?php  
            while($user_data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$user_data['gudang_id']."</td>";
                echo "<td>".$user_data['nama_gudang']."</td>";
                echo "<td>".$user_data['deskripsi']."</td>";
                echo "<td>".$user_data['kota_id']."</td>";
                echo "<td><a href='edit_gudang.php?gudang_id=$user_data[gudang_id]'>Edit</a> | 
                        <a href='delete_gudang.php?gudang_id=$user_data[gudang_id]' onClick='myFunction()'>Delete</a></td></tr>";        
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