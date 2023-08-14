<?php
require_once('../inc/inc_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Hapus data dari database
    $sql = "DELETE FROM kegiatan WHERE id=$id";
    mysqli_query(connection(), $sql);

    header("Location: dashboard.php");
    exit();
}
?>
