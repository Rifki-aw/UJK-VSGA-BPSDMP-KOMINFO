<?php
require_once('../inc/inc_conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />

  <!-- CSS Style -->
  <link rel="stylesheet" href="../css/style_admin.css" />

  <!-- Icon -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />

  <!-- Data Table -->
  <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

  <!-- Summernote -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet" />

  <!-- JQuuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <!-- Sidebar Start -->
  <div class="sidebar">
    <div class="logo">
      <img src="../resources/logo_BPSDMP.png" alt="" width="50" height="50" class="d-inline-block align-text-top" />
      <div class="logo-name"><span> BPSDMP </span>Kominfo</div>
    </div>
    <ul class="side-menu">
      <li class="active">
        <a href="#"><i class="bx bxs-dashboard"></i>Dashboard</a>
      </li>
    </ul>
    <ul class="side-menu">
      <li>
        <a href="../index.php" class="logout"><i class="bx bx-log-out bx-fade-left-hover"></i>Log Out</a>
      </li>
    </ul>
  </div>
  <!-- Sidebar End -->
  <div class="content">
    <nav>
      <i class="bx bx-menu"></i>
    </nav>
    <main>
      <!-- Header Start -->
      <div class="header">
        <div class="left">
          <h1 class="title">Dashboard</h1>
          <ul class="breadcrumb">
            <li><a href="#"> Dashboard </a></li>
            /
            <li><a href="#" class="active"> Home </a></li>
          </ul>
        </div>
        <button href="#" class="report" data-bs-toggle="modal" data-bs-target="#loginModal">
          <i class="bx bx-plus-circle bx-tada-hover"></i>
          <span>Tambah Data</span>
        </button>
      </div>
      <!-- Header End -->

      <!-- Table Content Start -->
      <div class="bottom-data">
        <div class="orders">
          <div class="header">
            <i class="bx bx-receipt"></i>
            <h3>Data kegiatan</h3>
          </div>
          <table id="data-table">
            <thead>
              <tr>
                <th style="width: 10%;">No.</th>
                <th style="width: 25%;">Judul</th>
                <th style="width: 30%;">Deskripsi</th>
                <th style="width: 25%;">Gambar</th>
                <th style="width: 10%;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = 'SELECT * FROM kegiatan ORDER BY timestamp DESC';
              $result = mysqli_query(connection(), $query);
              $no = 1;

              foreach ($result as $row) :
              ?>
                <tr>
                  <td>
                    <?= $no++; ?>
                  </td>
                  <td>
                    <?= $row['judul']; ?>
                  </td>
                  <td class="truncate-text">
                    <?= $row['keterangan']; ?>
                  </td>
                  <td>
                    <div class="gambar-container">
                      <a href="gambar_upload/<?= $row['gambar']; ?>" target="_blank">
                        <img src="gambar_upload/<?= $row['gambar']; ?>" alt="<?= $row['gambar']; ?>">
                      </a><br>
                    </div>
                    <a href="gambar_upload/<?= $row['gambar']; ?>" target="_blank"><?= $row['gambar']; ?></a>
                  </td>
                  <td class="aksi">
                    <div class="aksi-buttons">
                      <button type="button" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#editModal" onclick='editInput(<?= json_encode($row); ?>)'>
                        <i class='bx bx-edit bx-tada-hover'></i>
                      </button>
                      <button type="button" class="btn btn-danger text-center" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id']; ?>">
                        <i class='bx bxs-trash bx-tada-hover'></i>
                      </button>
                    </div>
                  </td>
                </tr>

                <!-- Modal Delete Data Start -->
                <div class="modal fade" tabindex="-1" id="deleteModal<?= $row['id']; ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Hapus Data Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data kegiatan ini?
                      </div>
                      <div class="modal-footer">
                        <form action="delete_data.php" method="POST">
                          <input type="hidden" name="id" value="<?= $row['id']; ?>">
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal Delete Data End -->
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Table Content End -->
    </main>
  </div>

  <footer>
    <!-- Modal Add Data Start -->
    <div class="modal fade" tabindex="-1" id="loginModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="title">Tambah Data</h5> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <!-- Modal Body -->
          <div class="modal-body">
            <div class="container">
              <form action="upload.php" method="POST" id="addForm" enctype="multipart/form-data">
                <!-- <h4 id="title"></h4> -->
                <div class="row mb-3">
                  <div class="form-group">
                    <label for="judul" class="form-label">Judul Kegiatan</label>
                    <input name="judul" id="judul" cols="30" rows="10" class="form-control" rows="3">
                  </div>
                  <div class="form-group">
                    <label for="keterangan" class="form-label">Keterangan Kegiatan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="file" class="form-label">Tambahkan Gambar</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*" class="form-control" placeholder="contoh: 123456" />
                  </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                  <button type="submit" name="submit" class="btn btn-primary me-2" value="add">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Add Data End -->

    <!-- Modal Edit Data Start -->
    <div class="modal fade" tabindex="-1" id="editModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data Kegiatan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form action="edit_data.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" id="editId" name="id">
              <div class="form-group">
                <label for="editJudul" class="form-label">Judul Kegiatan</label>
                <input type="text" class="form-control" id="editJudul" name="judul">
              </div>
              <div class="form-group">
                <label for="editKeterangan" class="form-label">Keterangan Kegiatan</label>
                <textarea class="form-control" id="editKeterangan" name="keterangan"></textarea>
              </div>
              <div class="form-group">
                <label for="editGambar" class="form-label">Ubah Gambar</label>
                <input type="file" class="form-control" id="editGambar" name="gambar" accept="image/*">
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Edit Data End -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
      $(document).ready(function() {
        // Initialize DataTable with paging options
        $("#data-table").DataTable({
          paging: true,
          lengthChange: false,
          searching: true,
          ordering: true,
          info: true,
          autoWidth: false,
          pageLength: 5, // Change the number of rows per page here (default is 10)
        });
      });
    </script>

    <script src="../js/script.js"></script>

    <!-- Edit Data -->
    <script>
      function editInput(row) {
        document.getElementById('editId').value = row.id;
        document.getElementById('editJudul').value = row.judul;
        document.getElementById('editKeterangan').value = row.keterangan;
      }
    </script>

    <!-- Cut kalimat -->
    <script>
      $(document).ready(function() {
        // Menggunakan class "truncate-text" untuk memotong teks isi kegiatan
        $('.truncate-text').each(function() {
          var maxChar = 150; // Jumlah karakter maksimal sebelum dipotong
          var text = $(this).text();
          if (text.length > maxChar) {
            var truncatedText = text.substring(0, maxChar) + '...';
            $(this).text(truncatedText);
          }
        });
      });
    </script>

    <!-- Summernote -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#keterangan").summernote({
          placeholder: "Tambahkan keterangan kegiatan...",
          height: 150,
        });

        $("#addForm").on("submit", function (event) {
          // Ambil konten dari Summernote
          var keteranganContent = $("#keterangan").summernote("code");
          // Masukkan konten ke dalam input tersembunyi dalam form
          $("#hiddenKeterangan").val(keteranganContent);
        });
      });
    </script> -->
</body>

</html>