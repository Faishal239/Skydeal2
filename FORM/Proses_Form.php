<?php
session_start();
include "../LOGIN/koneksi.php"; 

if (!isset($_SESSION['id'])) {
    header("Location: ../LOGIN/index.html"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_SESSION['id'];
    $nama = $_POST['nama_lengkap'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nik = $_POST['nik'];
    $departure = $_POST['departure'];
    $destinasi = $_POST['destinasi'];
    $tanggal_keberangkatan = $_POST['tanggal'];
    $waktu_berangkat = $_POST['Departure_Time'];
    $passenger = $_POST['jumlah_penumpang'];
    $seat_class = $_POST['seat_class'];
    $kode = $_POST['flight_code'];

    $id_produk = 1;

    $sql = "INSERT INTO tabel_pemesanan 
        (nama_lengkap, Tanggal_lahir, NIK, kode_penerbangan, destinasi, Departure_time, Seat_class, id_user, id_produk, jumlah_penumpang, tanggal_keberangkatan, departure)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssssssiiiss", 
        $nama, $tanggal_lahir, $nik, $kode, $destinasi, $waktu_berangkat, $seat_class, 
        $id_user, $id_produk, $passenger, $tanggal_keberangkatan, $departure
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../RIWAYAT/Riwayat.php"); 
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>