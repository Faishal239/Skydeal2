<?php
session_start();
include '../LOGIN/koneksi.php';

if (isset($_SESSION['id'])) {
    $id_user = $_SESSION['id'];

    $query = "DELETE FROM tabel_usr WHERE id_user = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_unset();
    session_destroy();
    header("Location: ../LOGIN/index.html");
    exit();
} else {
    header("Location: ../LOGIN/index.html");
    exit();
}
?>
