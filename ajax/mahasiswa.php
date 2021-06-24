<?php
usleep(500000);
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE 
				nama LIKE '%$keyword%' OR 
				nim LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%'
			";
$mahasiswa = query($query);

// var_dump($mahasiswa);

?>
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
</table>