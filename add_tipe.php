<?php
    include_once("config.php");
?>

<html>
<head>
    <title>Add Tipe</title>
</head>

<body>
    <br><br>
    <a href="tipe.php" style="color:black;text-decoration:none;">Go to Tipe</a>
    <br/><br/>

    <form action="add_tipe.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama tipe</td>
                <td><input type="text" name="nama_tipe"></td>
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
            $nama_tipe = $_POST['nama_tipe'];

            // include database connection file
            include_once("config.php");

            // Insert user data into table
            $result = mysqli_query($mysqli, "INSERT INTO tipe(nama_tipe)
                VALUES('$nama_tipe')");

            // Show message when user added
            echo "User added successfully. <a href='tipe.php'>View Users</a>";
        }
    ?>
</body>
</html>