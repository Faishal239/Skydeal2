<?php
include "../../LOGIN/koneksi.php";
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tabel_usr WHERE id_user=$id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_telpon = $_POST['no_hp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $role = 'user'; 

    $sql = "UPDATE tabel_usr 
            SET Username='$username', 
                Password='$password', 
                no_telpon='$no_telpon',
                Jenis_Kelamin='$jenis_kelamin', 
                role='$role' 
            WHERE id_user=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: Index.php");
        exit();
    } else {
        echo "Gagal mengedit user.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="Edit.css"> 
</head>
<body>
    <div class="form-container">
        <h2>Edit User</h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?= $data['Username'] ?>" required>

            <label for="password">Password:</label>
            <input type="text" name="password" value="<?= $data['Password'] ?>" required>

            <label for="no_hp">No HP:</label>
            <input type="text" name="no_hp" value="<?= $data['no_telpon'] ?>" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki" <?= $data['Jenis_Kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $data['Jenis_Kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>

            <input type="hidden" name="role" value="user"> 

            <button type="submit" class="btn-submit">Update</button>
        </form>
    </div>
</body>
</html>