<?php
// index.php - TAMPILAN DATA PRODUK
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../LOGIN/index.html");
    exit();
}
include "../../LOGIN/koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM tabel_produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link rel="stylesheet" href="Produk.css">
</head>
<body>
    <h2>Data Produk</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Kota</th>
            <th>ID Kode</th>
            <th>Nama Tempat</th>
            <th>Foto Tempat</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id_produk'] ?></td>
            <td><?= $row['id_kota'] ?></td>
            <td><?= $row['id_kode'] ?></td>
            <td><?= $row['nama_tempat'] ?></td>
            <td><img src="uploads/<?= $row['foto_tempat'] ?>" width="100"></td>
            <td><?= $row['Deskripsi'] ?></td>
            <td><?= $row['Harga'] ?></td>
            <td>
                <a href="Edit.php?id=<?= $row['id_produk'] ?>">Edit</a> |
                <a href="Hapus.php?id=<?= $row['id_produk'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>