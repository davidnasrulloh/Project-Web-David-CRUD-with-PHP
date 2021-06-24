<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    // cek data berhasil atau tidak
    if (ubah($_POST) > 0) {
        echo "
			<script> 
				alert('data berhasil diubah :)');
				document.location.href='index.php';
			</script>	
		";
    } else {
        echo "
			<script> 
				alert('data gagal diubah :)');
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
    <link rel="stylesheet" href="css/ubah.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="judul-atas">
            <h1 class="text-center mb-5">Edit Data Mahasiswa</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form class="bungkus" action="" method="POST">
                    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $mhs['nim']; ?>">
                    </div> <br>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $mhs['nama']; ?>">
                    </div> <br>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $mhs['jurusan']; ?>">
                    </div> <br>
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px;"><i class="far fa-save"></i> Simpan</button>
                    <a href="index.php" class="btn btn-secondary" style="width: 90px;"><i class="fas fa-window-close"></i> Batal</a>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <script src="js/main.js"></script> -->
</body>

</html>