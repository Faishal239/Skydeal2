<?php
include "../../LOGIN/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $role = 'admin'; 

    $sql = "INSERT INTO tabel_usr (Username, Password, Jenis_Kelamin, role) VALUES ('$username', '$password', '$jenis_kelamin', '$role')";
    if (mysqli_query($conn, $sql)) {
        header("Location: Index.php");
        exit();
    } else {
        echo "Gagal menambahkan user.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Admin</title>
    <link rel="stylesheet" href=" Tambah.css"> 
</head>
<body>
    <div class="form-container">
        <h2>Tambah Admin</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="text" name="password" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <input type="hidden" name="role" value="admin"> 

            <button type="submit" class="btn-submit">Simpan</button>
        </form>
    </div>
</body>
</html>