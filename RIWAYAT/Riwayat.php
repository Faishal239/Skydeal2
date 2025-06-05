<?php
session_start();
include "../LOGIN/koneksi.php";

if (!isset($_SESSION['id'])) {
    header("Location: ../LOGIN/index.html");
    exit();
}

$id_user = $_SESSION['id'];
$query = "SELECT * FROM tabel_pemesanan WHERE id_user = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id_user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan</title>
    <link rel="stylesheet" href="Riwayat.css">
</head>
<body>

<div class="navbar">
    <div class="icon">
        <a href="../Informasi/Informasi2.html">
            <p class="hello">
                <span class="sky">SKY</span><span class="deal">DEAL</span>
            </p>
        </a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="../Destinasi/Destinasi.html">Destinasi</a></li>
            <li><a href="../CABIN/Cabin.html">Pusat Informasi</a></li>
            <li><a href="../RIWAYAT/Riwayat.php">Riwayat Pemesanan</a></li>
            <li><a href="../ABOUT/About.html">Tentang Kami</a></li>
        </ul>
    </div>
</div>

<div class="persegi-panjang">
    <h1 class="HAF">Riwayat Pemesanan</h1>
    <div class="tabel-pss">
        <table class="tabel-riwayat">
            <thead>
            <tr>
                <th class="kolom-no">No</th>
                <th class="name">Nama Lengkap</th>
                <th class="tanggal-lahir">Tanggal Lahir</th>
                <th class="NIK">NIK</th>
                <th class="otw">Departure</th>
                <th class="sampe">Destinasi</th>
                <th class="kolom-tiba">Tanggal Keberangkatan</th>
                <th class="kolom-tiba">Departure Time</th>
                <th class="orang">Passanger</th>
                <th class="kelas">Seat Class</th>
                <th class="kode">Kode Penerbangan</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . htmlspecialchars($row['nama_lengkap']) . "</td>
                    <td>" . htmlspecialchars($row['Tanggal_lahir']) . "</td>
                    <td>" . htmlspecialchars($row['NIK']) . "</td>
                    <td>" . htmlspecialchars($row['departure']) . "</td>
                    <td>" . htmlspecialchars($row['destinasi']) . "</td>
                    <td>" . htmlspecialchars($row['tanggal_keberangkatan']) . "</td>
                    <td>" . htmlspecialchars($row['Departure_time']) . "</td>
                    <td>" . htmlspecialchars($row['jumlah_penumpang']) . "</td>
                    <td>" . htmlspecialchars($row['Seat_class']) . "</td>
                    <td>" . htmlspecialchars($row['kode_penerbangan']) . "</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>