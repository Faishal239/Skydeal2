<?php
include 'fungsi.php';
session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        $berhasil = tambah_data($_POST, $_FILES);

        if ($berhasil) {
            $_SESSION['hasil'] = "Data berhasil ditambahkan,success";
            header("location: index.html"); 
            exit();
        }

    } else if ($_POST['aksi'] == "edit") {
        $berhasil = ubah_data($_POST, $_FILES);

        if ($berhasil) {
            $_SESSION['hasil'] = "Data berhasil diperbarui,success";
            header("location: index.php");
            exit();
        }
    }
}

if (isset($_GET['hapus'])) {
    hapus_data($_GET); 
    header("location: index.php");
    exit();
}
?>