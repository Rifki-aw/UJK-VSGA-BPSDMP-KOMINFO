<?php
require_once('../inc/inc_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];

    // Update data di database
    $sql = "UPDATE kegiatan SET judul='$judul', keterangan='$keterangan' WHERE id=$id";
    mysqli_query(connection(), $sql);

    // Jika gambar juga ingin diedit
    if ($_FILES['gambar']['size'] > 0) {
        $gambarName = $_FILES['gambar']['name'];
        $gambarTmp = $_FILES['gambar']['tmp_name'];
        $targetPath = "gambar_upload/" . $gambarName;
        move_uploaded_file($gambarTmp, $targetPath);

        // Update nama gambar di database
        $sql = "UPDATE kegiatan SET gambar='$gambarName' WHERE id=$id";
        mysqli_query(connection(), $sql);
    }

    header("Location: dashboard.php");
    exit();
}
?>
