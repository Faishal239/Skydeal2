<?php

$koneksi = new mysqli("localhost", "root", "", "uklnew");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kota_input = trim($_POST['nama_kota']);
    $nama_kota_lower = strtolower($nama_kota_input);

    $sql = "SELECT tk.nama_kota 
            FROM tabel_kota tk
            JOIN tabel_kode kd ON kd.id_kota = tk.id_kota
            WHERE LOWER(tk.nama_kota) = ?";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $nama_kota_lower);
    $stmt->execute();
    $stmt->bind_result($nama_ditemukan);

    if ($stmt->fetch()) {
        // Folder: tanpa spasi, huruf kapital semua
        $folder = strtoupper(str_replace(" ", "", $nama_ditemukan));

        // File: nama kota tanpa spasi, huruf besar di awal
        $file = ucfirst(strtolower(str_replace(" ", "", $nama_ditemukan)));

        $host = $_SERVER['HTTP_HOST'];
        $url = "http://$host/loginukl/NEGARA/$folder/$file.html";

        header("Location: $url");
        exit();
    } else {
        echo "<p style='color:red;'>Kota tidak ditemukan.</p>";
    }

    $stmt->close();
}

$koneksi->close();
?>
