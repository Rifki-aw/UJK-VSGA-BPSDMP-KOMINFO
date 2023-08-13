<!doctype html>
<html lang="en">

<head>
    <title>Halaman Registrasi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/style_auth.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>

    <!-- Register Form Section Start -->
    <center>
        <section class="container">
            <div class="register-page">
                <div class="form">
                    <form action="inc_register.php" method="post">
                        <h3 class="register">Registrasi Admin</h3>
                        
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="6-10 karakter" class="form-control">
                        
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="contoh: 123456">
                        
                        <label for="conf_password">Konfirmasi Password</label>
                        <input type="password" name="conf_password" id="conf_password" class="form-control" placeholder="contoh: 123456">
                        
                        <div class="extra">
                            <button type="submit" name="register" class="btn btn-warning">Register</button>
                            <p class="click">Kembali <a href="../index.php" class="badge badge-dark">klik disini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </center>
    <!-- Register Form Section End -->
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    
</body>

</html>