<?php

session_start();

if (isset($_SESSION["login"])) {
	header("Location: index_a.php");
	exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["login"])) {
	$username = strtolower($_POST["user"]);
	$password = strtolower($_POST["password"]);

	$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

	// cek username
	if (mysqli_num_rows($result) === 1) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		if ($password == $row["password"]) {

			// set session
			$_SESSION["login"] = true;
			header("Location: index_a.php");
			exit;
		} else {
			echo "
					<script> 
						alert('Gagal Login');
						document.location.href='index.php';
					</script>	
				";
		}
	}

	$error = true;
}



if (isset($_POST["tambah"])) {
	if (tambah($_POST) > 0) {
		echo "
					<script> 
						alert('data berhasil ditambahkan :)');
						document.location.href='index.php';
					</script>	
				";
	} else {
		echo "
					<script> 
						alert('data gagal ditambahkan :)');
						document.location.href='index.php';
					</script>	
				";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>David Nasrulloh | 190441100060</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style type="text/css">
		.loader {
			width: 100px;
			position: absolute;
			top: 122px;
			/* left: 300px; */
			height: 100px;
			z-index: -1;
			display: none;
		}
	</style>
</head>

<body>
	<div>
		<div>
			<div>
				<div class="container-fluid header">
					<h1 class="text-center">Latihan CRUD Menggunakan PHP</h1>
					<h5>David Nasrulloh | 190441100060</h5>
				</div>
				<br>
				<div class="container">
					<h3 style="text-align:center;">Daftar Mahasiswa Universitas Maju Jalan</h3>
					<div class="tengah">
						<div class="button-utama">
							<button style="width:150px; margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-user-plus"></i> Tambah Data</button>
							<button style="margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt"></i> Login</button>
						</div>
						<form class="input-keyword" action="" method="POST">
							<label for="keyword"><i class="fas fa-search"></i></label>
							<input class="cari" type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword" value="">
							<button type="submit" hidden name="cari" id="tombolCari">Cari!</button>
							<img src="img/loader.gif" class="loader">
						</form>
					</div>

					<div class="table-responsive">
						<div id="container">
							<table class="table table-hover">
								<thead class="head-table">
									<tr>
										<th>No</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Jurusan</th>

									</tr>
								</thead>
								<?php $i = 1; ?>
								<?php foreach ($mahasiswa as $row) : ?>
									<tbody>
										<tr>
											<td scope="row"> <?= $i; ?> </td>
											<td><?= $row['nim']; ?></td>
											<td><?= $row['nama']; ?></td>
											<td><?= $row['jurusan']; ?> </td>

										</tr>
									</tbody>
									<?php $i++; ?>
								<?php endforeach; ?>
							</table> <br> <br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- TARGET PROSES -->
	<!-- Tambah Data -->
	<div style="margin: 110px auto;" class="modal" id="tambahModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data</h5>
					<button style="border: none; height:30px; width:30px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="POST" id="tbhMhs">
						<!-- <input type="hidden" name="action" value="tambah"> -->
						<div class="form-group">
							<label for="nim">NIM</label>
							<input type="text" required class="form-control" id="nim" name="nim" maxlength="12" onkeypress="return hanyaAngka(event)" value="" placeholder="NIM">
						</div> <br>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" required class="form-control" id="nama" name="nama" value="" placeholder="Nama">
						</div><br>
						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<input type="text" required class="form-control" id="jurusan" name="jurusan" value="" placeholder="Jurusan">
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="tambah" id="tblSimpan" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
					</form>
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Login Proses -->
	<div style="padding-top: 110px;" class="modal" id="loginModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Login Admin</h5>
					<button style="border: none; height:30px; width:30px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="index.php" method="POST" id="login">
						<!-- <input type="hidden" name="action" value="login"> -->
						<div class="form-group">
							<label for="user">Username</label>
							<input type="text" required class="form-control" id="user" name="user" value="" placeholder="Masukkan Username">
						</div><br>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" required class="form-control" id="password" name="password" value="" placeholder="Masukkan Password">
						</div>
				</div>
				<div class="modal-footer">
					<a style="display: block;" href="registrasi_admin.php">Belum punya akun? Klik disini</a>
					<button type="submit" name="login" id="login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
					</form>
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/tugas.js"></script>
	<script type="text/javascript" src="js/script.js"></script>


</body>

</html>