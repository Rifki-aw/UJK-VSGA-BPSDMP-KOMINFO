<?php

require ('../inc/inc_conn.php');

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek akun
    $query = "  SELECT *
                FROM users
                WHERE username = '$username' ";
    $result = mysqli_query(connection(), $query);

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $data = mysqli_fetch_assoc($result);
        if(password_verify($password, $data["password"])){
            header("Location: ../admin/dashboard.php");
            exit;
        }
    }
}
?>

