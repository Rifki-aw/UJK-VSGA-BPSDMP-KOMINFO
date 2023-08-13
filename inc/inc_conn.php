<?php

function connection()
{
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = '67_m_rifki_bahrul_ulum';

    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword);
    if (!$conn) {
        die('Koneksi gagal : ' . mysqli_connect_error());
    }

    mysqli_select_db($conn, $dbName);
    return $conn;
}
