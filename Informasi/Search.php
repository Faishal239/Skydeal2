<?php

$koneksi = new mysqli("localhost", "root", "", "uklnew");


if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kota = $_POST['nama_kota'];


    $sql = "SELECT tk.nama_kota 
            FROM tabel_kota tk
            JOIN tabel_kode kd ON kd.id_kota = tk.id
            WHERE LOWER(tk.nama_kota) = LOWER(?)";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $nama_kota);
    $stmt->execute();
    $stmt->bind_result($nama_ditemukan);

    if ($stmt->fetch()) {
        
        $folder = strtoupper($nama_ditemukan);              
        $file = ucfirst(strtolower($nama_ditemukan));       
        
        
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
