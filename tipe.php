<?php
    // Create database connection using config file
    include_once("config.php");

    // Fetch all users data from database
    $result = mysqli_query($mysqli, "SELECT 
                tipe_id,nama_tipe
                from tipe");
?>

<html>
<head>    
    <title>Tipe</title>
</head>
<body>
    <br><br>
    <a href="index.php" style="margin-left:135px;color:black;text-decoration:none;">Barang | </a>
    <a href="gudang.php" style="margin-left:5px;color:black;text-decoration:none;">Gudang</a><br><br>
    <a href="add_tipe.php" style="margin-left:135px;color:black;text-decoration:none;">Add New Tipe</a><br/><br/>
    <center>
        <table width='80%' border=1>
        <tr>
            <th>Tipe_id</th> 
            <th>Nama_tipe</th> 
            <th>Aksi</th>
        </tr>
        <?php  
            while($user_data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$user_data['tipe_id']."</td>";
                echo "<td>".$user_data['nama_tipe']."</td>";
                echo "<td><a href='edit_tipe.php?tipe_id=$user_data[tipe_id]'>Edit</a> | 
                        <a href='delete_tipe.php?tipe_id=$user_data[tipe_id]' onClick='myFunction()'>Delete</a></td></tr>";        
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