<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../LOGIN/index.html");
    exit();
}
include "../../LOGIN/koneksi.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE id_produk=$id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_kota = $_POST['id_kota'];
    $id_kode = $_POST['id_kode'];
    $nama_tempat = $_POST['nama_tempat'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    if ($_FILES['foto_tempat']['name']) {
        $foto = $_FILES['foto_tempat']['name'];
        $tmp = $_FILES['foto_tempat']['tmp_name'];
        move_uploaded_file($tmp, "uploads/" . $foto);
        $sql = "UPDATE tabel_produk SET id_kota='$id_kota', id_kode='$id_kode', nama_tempat='$nama_tempat',
                foto_tempat='$foto', Deskripsi='$deskripsi', Harga='$harga' WHERE id_produk=$id";
    } else {
        $sql = "UPDATE tabel_produk SET id_kota='$id_kota', id_kode='$id_kode', nama_tempat='$nama_tempat',
                Deskripsi='$deskripsi', Harga='$harga' WHERE id_produk=$id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: Index.php");
        exit();
    } else {
        echo "Gagal mengedit produk.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="Edit.css">
</head>
<body>
<h2>Edit Produk</h2>
<form method="POST" enctype="multipart/form-data">
    <label>ID Kota:</label>
    <input type="text" name="id_kota" value="<?= $data['id_kota'] ?>" required><br>

    <label>ID Kode:</label>
    <input type="text" name="id_kode" value="<?= $data['id_kode'] ?>" required><br>

    <label>Nama Tempat:</label>
    <input type="text" name="nama_tempat" value="<?= $data['nama_tempat'] ?>" required><br>

    <label>Foto Tempat Saat Ini:</label><br>
    <?php if ($data['foto_tempat']): ?>
        <img src="uploads/<?= $data['foto_tempat'] ?>" width="150" style="margin-bottom:10px;"><br>
    <?php else: ?>
        <em>Tidak ada foto</em><br>
    <?php endif; ?>

    <label>Upload Foto Baru (Opsional):</label>
    <input type="file" name="foto_tempat"><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi" required><?= $data['Deskripsi'] ?></textarea><br>

    <label>Harga:</label>
    <input type="number" name="harga" value="<?= $data['Harga'] ?>" required><br>

    <input type="submit" value="Update">
</form>
</body>
</html>