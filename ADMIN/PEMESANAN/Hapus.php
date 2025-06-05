<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../LOGIN/index.html");
    exit();
}
include "../../LOGIN/koneksi.php";

$id = $_GET['id'];
$sql = "DELETE FROM tabel_pemesanan WHERE id_pemesanan = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: Index.php");
    exit();
} else {
    echo "Gagal menghapus data.";
}
?>