<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

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
                    <h1 class="text-center">Latihan CRUD Menggunakan PHP | Halaman Admin</h1>
                    <h5>David Nasrulloh | 190441100060</h5>
                </div>
                <div class="container">
                    <h3 style="padding-top:20px; text-align:center;">Daftar Mahasiswa Universitas Maju Jalan</h3>
                    <div class="tengah">
                        <div class="button-utama">
                            <button style="width:150px; margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-user-plus"></i> Tambah Data</button>
                            <a style="margin-right: 10px; margin-bottom: 10px;" href="logout.php" type="button" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>

                        <form class="input-keyword" action="" method="POST">
                            <label for="keyword_a"> <i class="fas fa-search"></i> <input class="cari" type="text" name="keyword_a" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword_a" value=""></label>
                            <button type="submit" hidden name="cari" id="tombolCari">Cari!</button>
                            <img src="img/loader.gif" class="loader">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <div id="container1">
                            <table class="table table-hover table-dark">
                                <thead class="head-table">
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
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
                                            <td>
                                                <a href="ubah.php?id=<?= $row['id']; ?>" class="btn btn-success"><i class="far fa-edit"></i> Ubah</a> |
                                                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm(' yakin ?');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Hapus</a>
                                            </td>
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
    <div style="padding-top: 100px;" class="modal" id="tambahModal" tabindex="-1" role="dialog">
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


    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/tugas.js"></script>
    <script>
        $(document).ready(function() {
            // hilangkan tombol cari
            $('#tombolCari').hide();

            // buat event ketika keyword ditulis
            $('#keyword_a').on('keyup', function() {
                // munculkan icon loading
                $('.loader').show();

                // ajax menggunakan fungsi load pada jQuery
                // $('#container1').load('ajax/mahasiswa_a.php?keyword_a=' + $('#keyword_a').val());

                // $_GET()
                $.get('ajax/mahasiswa_a.php?keyword_a=' + $('#keyword_a').val(), function(data) {
                    $('#container1').html(data);
                    $('.loader').hide();
                });
            });
        });
    </script>
    <!-- < type="text/javascript" src="js/script.js"></> -->


</body>

</html>