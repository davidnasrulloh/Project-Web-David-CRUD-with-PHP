<?php
usleep(500000);

require '../functions.php';

$keyword = $_GET["keyword_a"];

$query = "SELECT * FROM mahasiswa WHERE 
				nama LIKE '%$keyword%' OR 
				nim LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%'
			";
$mahasiswa = query($query);

// var_dump($mahasiswa);

?>
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
</table>
<br><br>