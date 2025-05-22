<!DOCTYPE html>

<?php
include 'koneksi.php';

$id= '';
$username = '';
$password= '';
$jenis_kelamin = '';

if(isset($_GET['ubah'])){
	$id = $_GET['ubah'];

	$query = "SELECT * FROM tabel_usr WHERE id = '$id';";
	$sql = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($sql);

	$username = $result['Username'];
	$password = $result['Password'];
	$jenis_kelamin = $result['Jenis_Kelamin'];

		//var_dump($result);
		//die();
}
?>

<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js" ></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	
	<title>belajar_crud</title>
</head>
<body>
	<nav class="navbar navbar-light bg-light mb-4">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				CRUD - BS5
			</a>
		</div>
	</nav>
	<div class="container">
		<form method="POST" action="proses.php" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $id; ?>" name="id">
			<div class="mb-3 row">
				<label for="nama" class="col-sm-2 col-form-label">
					Username
				</label>
				<div class="col-sm-10">
					<input required type="text" name="Username" class="form-control" id="nama" placeholder="Ex: Alexander" value="<?php echo $username; ?>">
				</div>
			</div>

			<div class="mb-3">
               <label for="" class="form-label">Password</label>
               <input required type="Password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda" value="<?php echo $password ?>">
            </div>

			<div class="mb-3 row">
				<label for="jkel" class="col-sm-2 col-form-label">
					Jenis Kelamin
				</label>
				<div class="col-sm-10">
					<select required id="jkel" name="jenis_kelamin" class="form-select">
						<option value="Laki-laki" <?php if($jenis_kelamin == 'Laki-laki'){ echo "selected";} ?> value="Laki-laki">Laki-laki</option>
						<option value="Perempuan" <?php if($jenis_kelamin == 'Perempuan'){ echo "selected";} ?> value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>

			<div class="mb-3 row mt-4">
				<div class="col">
					<?php
					if(isset($_GET['ubah'])){
						?>
						<button type="submit" name="aksi" value="edit" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Simpan Perubahan
						</button>
						<?php
					} else {
						?>
						<button type="submit" name="aksi" value="add" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Tambahkan
						</button>
						<?php
					}
					?>
					<a href="index.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						Batal
					</a>
				</div>
			</div>
		</form>
	</div>
	<div class="position-absolute bottom-0 start-50 translate-middle-x">
		<div class="d-flex p-2 bd-highlight bg-dark text-white">
			I'm a flexbox container!
		</div>
	</div>
</body>
</html>