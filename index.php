<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM online ORDER BY id DESC");
?>

<html>

<head>
    <link rel="stylesheet" href="css/table.css">
    <title>Homepage</title>
</head>

<body>
    <a class="button" href="add.php"><button>Add New User</button></a><br /><br/>

    <table width='80%' border=1>

        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Alamat</th>
            <th>Update</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['name'] . "</td>";
            echo "<td>" . $user_data['email'] . "</td>";
            echo "<td>" . $user_data['mobile'] . "</td>";
            echo "<td>" . $user_data['alamat'] . "</td>";
            echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <a class="button" href="index.html"><button>Back to Menu</button></a><br /><br/>
</body>

</html>