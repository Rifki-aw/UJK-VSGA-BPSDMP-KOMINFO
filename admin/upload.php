<?php
require ('../inc/inc_conn.php');

connection();

$judul = $_POST['judul'];
$keterangan = $_POST['keterangan'];
$gambarName = $_FILES['gambar']['name'];
$gambarTmp = $_FILES['gambar']['tmp_name'];

// Menyimpan gambar ke folder
$targetFolder = "gambar_upload/";
$targetPath = $targetFolder . $gambarName;
move_uploaded_file($gambarTmp, $targetPath);

// Memasukkan data ke database
$sql = "INSERT INTO kegiatan (judul, keterangan, gambar) VALUES ('$judul', '$keterangan', '$gambarName')";

if (connection()->query($sql) === TRUE) {
    echo "<script>alert('Kegiatan berhasil ditambahkan'); document.location.href = 'dashboard.php';</script>";
}
?>