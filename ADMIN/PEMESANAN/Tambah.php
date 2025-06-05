<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../LOGIN/index.html");
    exit();
}
include "../../LOGIN/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_penerbangan = $_POST['kode_penerbangan'];
    $destinasi = $_POST['destinasi'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $seat_class = $_POST['seat_class'];
    $id_user = $_POST['id_user'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $id_produk = $_POST['id_produk'];
    $jumlah_penumpang = $_POST['jumlah_penumpang'];
    $tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
    $departure = $_POST['departure'];

    $sql = "INSERT INTO tabel_pemesanan (kode_penerbangan, destinasi, Departure_time, Arrival_time, Seat_class, id_user, nama_lengkap, id_produk, jumlah_penumpang, tanggal_keberangkatan, departure) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssisiiis", $kode_penerbangan, $destinasi, $departure_time, $arrival_time, $seat_class, $id_user, $nama_lengkap, $id_produk, $jumlah_penumpang, $tanggal_keberangkatan, $departure);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: Index.php");
        exit();
    } else {
        echo "Gagal menyimpan.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Pemesanan</title></head>
<body>
<h2>Tambah Data Pemesanan</h2>
<form method="POST">
    Kode: <input type="text" name="kode_penerbangan"><br>
    Destinasi: <input type="text" name="destinasi"><br>
    Departure Time: <input type="datetime-local" name="departure_time"><br>
    Arrival Time: <input type="datetime-local" name="arrival_time"><br>
    Seat Class: <input type="text" name="seat_class"><br>
    ID User: <input type="number" name="id_user"><br>
    Nama Lengkap: <input type="text" name="nama_lengkap"><br>
    ID Produk: <input type="number" name="id_produk"><br>
    Jumlah Penumpang: <input type="number" name="jumlah_penumpang"><br>
    Tanggal Keberangkatan: <input type="date" name="tanggal_keberangkatan"><br>
    Departure: <input type="text" name="departure"><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>
