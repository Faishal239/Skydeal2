<?php
include 'koneksi.php';

$query = "SELECT * FROM tabel_usr;";
$sql = mysqli_query($conn, $query);
$no = 0;

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js" ></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

	<!-- JQuery -->
	<link rel="stylesheet" type="text/css" href="datatables/datatables.css"/>
	<script type="text/javascript" src="datatables/datatables.js"></script>

	<title>belajar_crud</title>
</head>
<script type="text/javascript">
	$(document).ready( function () {
		$('#dt').DataTable();
	} );
</script>
<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				CRUD - BS5
			</a>
		</div>
	</nav>

	<!-- Judul -->
	<div class="container">
		<h1 class="mt-4">Data User Flyadeal</h1>
		<figure>
			<blockquote class="blockquote">
				<p>Berisi data yang telah disimpan di database.</p>
			</blockquote>
			<figcaption class="blockquote-footer">
				CRUD <cite title="Source Title">Create Read Update Delete</cite>
			</figcaption>
		</figure>
		<a href="kelola.php" type="button" class="btn btn-primary mb-3">
			<i class="fa fa-plus"></i>
			Tambah Data
		</a>
		<?php
		if(isset($_SESSION['hasil'])):
			$split = explode(",", $_SESSION['hasil']);
			?>
			<div class="alert alert-<?php echo $split[1];?> alert-dismissible fade show" role="alert">
				<strong><?php echo $split[0];?></strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
			session_destroy();
		endif;
		?>
		<div class="table-responsive">
			<table id="dt" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th><center>id</center></th>
						<th>Username</th>
						<th>Password</th>
						<th>Jenis Kelamin</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while($result = mysqli_fetch_assoc($sql)){
						?>
						<tr>
							<td><center>
								<?php echo ++$no; ?>.
							</center></td>
							<td>
								<?php echo $result['Username']; ?>
							</td>
							<td>
								<?php echo $result['Password']; ?>
							</td>
							<td>
							     <?php echo $result['Jenis_Kelamin']; ?>
							</td>
							<td>
								
							</td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>