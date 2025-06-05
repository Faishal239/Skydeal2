<?php
include 'koneksi.php';

function tambah_data($data, $files){
    $username = $data['Username'];
    $password = $data['password'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $role = 'user'; 

    $query = "INSERT INTO tabel_usr (Username, Password, Jenis_Kelamin, role) 
              VALUES ('$username', '$password', '$jenis_kelamin', '$role')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

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
    $role = isset($data['role']) ? $data['role'] : 'user';

    $query = "UPDATE tabel_usr 
              SET Username='$username', Password='$password', Jenis_Kelamin='$jenis_kelamin', role='$role' 
              WHERE id_user='$id'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    if (!$sql) {
        die("Query ubah_data gagal: " . mysqli_error($GLOBALS['conn']));
    }

    return true;
}

function hapus_data($data){
    $id = $data['hapus'];

    $query = "DELETE FROM tabel_usr WHERE id_user = '$id'";
    $sql = mysqli_query($GLOBALS['conn'], $query);
}