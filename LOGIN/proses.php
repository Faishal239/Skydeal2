<?php
	include 'fungsi.php';
	session_start();

	if(isset($_POST['aksi'])){
		if($_POST['aksi'] == "add"){
			
			$berhasil = tambah_data($_POST, $_FILES);

			if($berhasil){
				$_SESSION['hasil'] = "Data berhasil ditambahkan,success";
				header("location: index.html");
				exit();
			} else {
				echo $berhasil;
			}
		}
	}
?>