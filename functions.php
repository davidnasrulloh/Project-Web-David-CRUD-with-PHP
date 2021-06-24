<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tg_pbw_tugas8_crud");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $result = mysqli_query($conn, "SELECT nim FROM mahasiswa WHERE nim = '$nim'");
    // cek nim sama atau tidak
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('nim yang dimasukkan sudah terdaftar');
            </script>
        ";

        return false;
    }

    // query insert data
    $query = "INSERT INTO mahasiswa VALUES ('','$nim', '$nama', '$jurusan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // query update data
    $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // query untuk cek username sudah ada atau belum 
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah terdaftar');
            </script>
        ";

        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai');
            </script>
        ";
        return false;
    }

    mysqli_query($conn, "INSERT INTO admin VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
