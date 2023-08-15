<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: admin/dashboard.php");
    exit;
}

include('inc/inc_conn.php');

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
        $data = mysqli_fetch_assoc($result); // Define $data even on successful login check
        if (password_verify($password, $data["password"])) {

            // set session
            $_SESSION["login"] = true;


            header("Location: admin/dashboard.php");
            exit;
        }
    } else {
        $error = true;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>VSGA BPSDMP - Home</title>
    <link rel="icon" href="resources/logo_BPSDMP.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- CSS Style -->
    <link rel="stylesheet" href="css/style_user.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="resources/logo_BPSDMP.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                BPSDMP Kominfo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#products">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                </ul>
                <div class="navbar-extra">
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#loginModal">Login Admin</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <main>
        <!-- Hero Section Start -->
        <section class="hero" id="home">
            <div class="content">
                <!-- Carousel Start -->
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="resources/tambahan 2.jpg" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="resources/tambahan.jpg" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="resources/tambahan 3.jpg" class="d-block w-100" alt="Image 2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Carousel End -->
            </div>
            <main class="content">
                <h1>BPSDMP <span>Kominfo</span></h1>
                <p>
                    Badan Pengembangan Sumber Daya Manusia Komunikasi dan Informatika
                </p>
            </main>
        </section>


        <!-- Hero Section End -->

        <!-- Product Section Start -->
        <section class="products" id="products">
            <h2>Kegiatan BPSDMP <span>Kominfo</span> </h2>
            <div class="row">
                <!-- Product 1 -->
                <?php
                $query = "SELECT * FROM kegiatan ORDER BY timestamp DESC";
                $result = mysqli_query(connection(), $query);
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                    <div class="product-card">
                        <div class="product-img">
                            <img src="admin/gambar_upload/<?php echo $row['gambar']; ?>" alt="gambar" />
                        </div>
                        <div class="product-content">
                            <h3><?php echo $row['judul']; ?></h3>
                            <div class="product-price keterangan"><?php echo $row['keterangan']; ?></div>
                            <div class="product-price">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#productModal-<?php echo $row['id']; ?>">Baca lebih lanjut >> </a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Product <?php echo $row['id']; ?> -->
                    <div class="modal fade" id="productModal-<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $row['judul']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="admin/gambar_upload/<?php echo $row['gambar']; ?>" alt="gambar" />
                                    <p style="text-align: justify;"><?php echo $row['keterangan']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
        <!-- Product Section End -->

    </main>

    <footer>
        <!-- Abouut Section Start -->
        <section id="about" class="about">
            <h2>Tentang<span> Kami</span></h2>
            <div class="container">
                <div class="row">
                    <div class="content col-lg-6">
                        <h3>Balai Pengembangan Sumber Daya Manusia dan Penelitian Komunikasi dan Informatika Surabaya</h3>
                        <h3>Badan Penelitian dan Pengembangan Sumber Daya Manusia - Kementerian Komunikasi dan Informatika Republik Indonesia</h3>
                    </div>
                    <div class="content col-lg-6">
                        <p>
                            <i class='bx bx-buildings bx-sm'></i>
                            Jl. Raya Ketajen No.36, Ketajen, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254
                        </p>

                        <p>
                            <i class='bx bx-phone bx-sm'></i>
                            (031) 8011944
                        </p>
                        <p>
                            <i class='bx bxs-map bx-sm'></i>
                            Jawa Timur
                        </p>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12 text-center">
                        <div class="credit">
                            <p>Created by <a href="#about">Muhammad Rifki Bahrul Ulum</a>. &copy; 2023.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Abouut Section End -->

        <!-- Modal Login Start -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="container">
                            <form action="" method="POST" id="addForm">
                                <h4 id="title">Login Admin</h4>
                                <div class="row mb-3">
                                    <div class="form-group">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" placeholder="6-10 karakter" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="contoh: 123456">
                                    </div>
                                </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="submit" name="login" class="btn btn-primary me-2">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Login End -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var productContents = document.querySelectorAll('.product-price');

            // Loop melalui semua elemen dengan class .product-content
            productContents.forEach(function(content) {
                var maxChar = 200; // Jumlah karakter maksimal sebelum ditampilkan ...
                var text = content.textContent.trim();

                // Cek apakah teks terlalu panjang
                if (text.length > maxChar) {
                    var truncatedText = text.substring(0, maxChar) + '...';
                    content.innerHTML = ''; // Hapus teks asli
                    content.textContent = truncatedText; // Tampilkan teks yang dipotong
                }
            });
        });
    </script>

    <script>
        <?php if ($error) : ?>
            document.addEventListener('DOMContentLoaded', function() {
                var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                loginModal.show();
                document.getElementById('username').focus(); // Focus on the input field

                // Show alert message inside the modal
                var alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger';
                alertDiv.textContent = 'Invalid username or password. Please try again.';
                document.getElementById('addForm').appendChild(alertDiv);
            });
        <?php endif; ?>
    </script>

</body>

</html>