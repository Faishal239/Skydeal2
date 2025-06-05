<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../LOGIN/index.html");
    exit();
}
include "../../LOGIN/koneksi.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tabel_produk WHERE id_produk = $id");
header("Location: Index.php");
exit();
?>