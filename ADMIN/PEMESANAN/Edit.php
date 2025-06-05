<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../LOGIN/index.html");
    exit();
}
include "../../LOGIN/koneksi.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tabel_pemesanan WHERE id_pemesanan = $id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_penerbangan = $_POST['kode_penerbangan'];
    $destinasi = $_POST['destinasi'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $seat_class = $_POST['seat_class'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jumlah_penumpang = $_POST['jumlah_penumpang'];
    $tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
    $departure = $_POST['departure'];

    $sql = "UPDATE tabel_pemesanan SET kode_penerbangan=?, destinasi=?, Departure_time=?, Arrival_time=?, Seat_class=?, nama_lengkap=?, jumlah_penumpang=?, tanggal_keberangkatan=?, departure=? WHERE id_pemesanan=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssissi", $kode_penerbangan, $destinasi, $departure_time, $arrival_time, $seat_class, $nama_lengkap, $jumlah_penumpang, $tanggal_keberangkatan, $departure, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: Index.php");
        exit();
    } else {
        echo "Update gagal.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Pemesanan</title></head>
<body>
<h2>Edit Data Pemesanan</h2>
<form method="POST">
    Kode: <input type="text" name="kode_penerbangan" value="<?= $data['kode_penerbangan'] ?>"><br>
    Destinasi: <input type="text" name="destinasi" value="<?= $data['destinasi'] ?>"><br>
    Departure Time: <input type="datetime-local" name="departure_time" value="<?= date('Y-m-d\TH:i', strtotime($data['Departure_time'])) ?>"><br>
    Arrival Time: <input type="datetime-local" name="arrival_time" value="<?= date('Y-m-d\TH:i', strtotime($data['Arrival_time'])) ?>"><br>
    Seat Class: <input type="text" name="seat_class" value="<?= $data['Seat_class'] ?>"><br>
    Nama Lengkap: <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>"><br>
    Jumlah Penumpang: <input type="number" name="jumlah_penumpang" value="<?= $data['jumlah_penumpang'] ?>"><br>
    Tanggal Keberangkatan: <input type="date" name="tanggal_keberangkatan" value="<?= $data['tanggal_keberangkatan'] ?>"><br>
    Departure: <input type="text" name="departure" value="<?= $data['departure'] ?>"><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>