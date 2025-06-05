<?php
include "../../LOGIN/koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM tabel_usr WHERE role = 'user' ORDER BY id_user ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <link rel="stylesheet" href="User.css"> 
</head>
<body>
    <h2>Data User</h2>
    <a href="Tambah.php" class="add-btn">+ Tambah User</a>

    <table>
        <tr>
            <th>No</th>
            <th>ID User</th>
            <th>Username</th>
            <th>Password</th>
            <th>No Telpon</th>
            <th>Jenis Kelamin</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['id_user']}</td>
                    <td>{$row['Username']}</td>
                    <td>{$row['Password']}</td>
                    <td>{$row['no_telpon']}</td>
                    <td>{$row['Jenis_Kelamin']}</td>
                    <td>{$row['role']}</td>
                    <td>
                        <a href='Edit.php?id={$row['id_user']}'>Edit</a> | 
                        <a href='Hapus.php?id={$row['id_user']}' onclick=\"return confirm('Yakin ingin menghapus user ini?')\">Hapus</a>
                    </td>
                </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>