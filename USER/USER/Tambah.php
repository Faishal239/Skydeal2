<?php
include "../../LOGIN/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_telpon = $_POST['no_hp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $role = 'user'; 

    $sql = "INSERT INTO tabel_usr (Username, Password, Jenis_Kelamin, no_telpon, role) VALUES ('$username', '$password', '$jenis_kelamin', '$no_telpon', '$role')";
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
    <title>Tambah User</title>
    <link rel="stylesheet" href=" Tambah.css"> 
</head>
<body>
    <div class="form-container">
        <h2>Tambah User</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="text" name="password" required>

            <label>No HP:</label><br>
            <input type="text" name="no_hp" required><br><br>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <input type="hidden" name="role" value="user"> 

            <button type="submit" class="btn-submit">Simpan</button>
        </form>
    </div>
</body>
</html>