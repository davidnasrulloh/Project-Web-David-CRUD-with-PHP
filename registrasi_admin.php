<?php

require 'functions.php';

if (isset($_POST["registrasi"])) {
    // cek data berhasil atau tidak
    if (registrasi($_POST) > 0) {
        echo "
			<script> 
				alert('Registrasi berhasil, mantapsss :) ');
				document.location.href='index.php';
			</script>	
		";
    } else {
        echo "
			<script> 
				alert('Gagal registrasi :(');
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
            <h1 class="text-center mb-5">Registrasi Akun Admin</h1>
        </div>
        <div class="bungkus row justify-content-center">
            <div class="col-md-5">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                    </div> <br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                    </div> <br>
                    <div class="form-group">
                        <label for="password2">Confirm Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Your Password">
                    </div> <br>
                    <button type="submit" name="registrasi" class="btn btn-primary" style="width: 120px; margin-right:10px;"><i class="fas fa-user-plus"></i> Registrasi</button>
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