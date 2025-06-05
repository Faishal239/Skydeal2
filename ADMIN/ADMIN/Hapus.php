<?php
include "../../LOGIN/koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tabel_usr WHERE id_user=$id");
header("Location: Index.php");
exit();
?>