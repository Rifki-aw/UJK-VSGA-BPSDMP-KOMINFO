<?php
include ('inc/inc_conn.php');

function register($data)
{
    // $query = 'SELECT * FROM users';
    // connection();
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string(connection(), $data['password']);
    $conf_password = mysqli_real_escape_string(connection(), $data['conf_password']);

    if($password !== $conf_password):
        echo "<script>alert('Konfirmasi Passsword Tidak Sesuai!')</script>";
        return false;
    endif;
}

if (isset($_POST["register"])):
    if (register($_POST) > 0):
        echo "<script>alert('Admin baru berhasil ditambahkan!')</script>";
    else:
        echo mysqli_error($conn);
    endif;
endif;