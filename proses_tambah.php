<?php
$koneksi = mysqli_connect("localhost", "root", "", "informatik");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$folder = "uploads/";

if (move_uploaded_file($tmp, $folder . $foto)) {
    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, alamat, foto) 
              VALUES ('$nama', '$nim', '$jurusan', '$alamat', '$foto')";

    if (mysqli_query($koneksi, $query)) {
        echo "Mahasiswa berhasil ditambahkan. <a href='datamahasiswa.php'>Lihat Data</a>";
    } else {
        echo "Gagal menambahkan: " . mysqli_error($koneksi);
    }
} else {
    echo "Gagal upload foto.";
}
?>
