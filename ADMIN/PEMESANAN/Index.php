<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../LOGIN/index.html");
    exit();
}
include "../../LOGIN/koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM tabel_pemesanan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Pemesanan</title>

<link rel="stylesheet" href="Pemesanan.css">
</head>
<body>
<h2>Data Pemesanan</h2>
<a href="Tambah.php">Tambah Pemesanan</a>
<table border="1">
    <tr>
        <th>ID</th><th>Kode</th><th>Destinasi</th><th>Departure</th><th>Arrival</th><th>Class</th><th>Nama</th><th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id_pemesanan'] ?></td>
            <td><?= $row['kode_penerbangan'] ?></td>
            <td><?= $row['destinasi'] ?></td>
            <td><?= $row['Departure_time'] ?></td>
            <td><?= $row['Arrival_time'] ?></td>
            <td><?= $row['Seat_class'] ?></td>
            <td><?= $row['nama_lengkap'] ?></td>
            <td>
                <a href="Edit.php?id=<?= $row['id_pemesanan'] ?>">Edit</a> |
                <a href="Hapus.php?id=<?= $row['id_pemesanan'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
