<?php
include 'koneksi.php';

function tambah_data($data, $files){
    // Ambil data dari form
    $username = $data['Username'];
    $password = $data['password'];
    $jenis_kelamin = $data['jenis_kelamin'];

    // Query insert
    $query = "INSERT INTO tabel_usr VALUES (null, '$username', '$password', '$jenis_kelamin')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    // Cek apakah query berhasil
    if (!$sql) {
        die("Query tambah_data gagal: " . mysqli_error($GLOBALS['conn']));
    }

    return true;
}

function ubah_data($data, $files){
    $id = $data['id'];
    $username = $data['Username'];
    $password = $data['password'];
    $jenis_kelamin = $data['jenis_kelamin'];

    // Query update
    $query = "UPDATE tabel_usr SET Username='$username', Password='$password', Jenis_Kelamin='$jenis_kelamin' WHERE id='$id'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    if (!$sql) {
        die("Query ubah_data gagal: " . mysqli_error($GLOBALS['conn']));
    }

    return true;
}

function hapus_data($data){
    $id = $data['hapus'];

    // Query delete
    $query = "DELETE FROM tabel_usr WHERE id = '$id'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    if (!$sql) {
        die("Query hapus_data gagal: " . mysqli_error($GLOBALS['conn']));
    }

    return true;
}
?>
