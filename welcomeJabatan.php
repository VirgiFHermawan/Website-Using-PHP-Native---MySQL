<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'functionJabatan.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$siswa = query("SELECT * FROM jabatan ORDER BY kode_jabatan DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>PHP NATIVE | CRUD App PHP</title>
</head>
<body>
    <!-- Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="#">PHP NATIVE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="welcome.php">Karyawan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="welcomeJabatan.php">Jabatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="welcomeHadir.php">Absen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
<!-- Close Navbar -->
<!-- Container -->
<div class="container">
    <div class="row my-3">
        <div class="col-md">
            <h3 class="text-uppercase text-center fw-bold">Data Jabatan Karyawan</h3>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-md">
            <a href="addDataJabatan.php" class = "btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
            
        </div>
    </div>
    <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode Jabatan</th>
                            <th>Nama Jabatan</th>
                            <th>Tugas</th>
                            <th>Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $row['kode_jabatan']; ?></td>
                                <td><?= $row['nama_jabatan']; ?></td>
                                <td><?= $row['tugas']; ?></td>
                                <td><?= $row['gaji']; ?></td>
                                <td>

                                    <a href="ubahJabatan.php?kode_jabatan=<?= $row['kode_jabatan']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |

                                    <a href="hapusJabatan.php?kode_jabatan=<?= $row['kode_jabatan']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nama_jabatan']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Close Container -->

<!-- Modal Detail Data -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-uppercase" id="detail">Detail Data Jabatan Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="detail-siswa">
                </div>
            </div>
        </div>
    </div>
    <!-- Close Modal Detail Data -->

<!-- Footer -->
<div class="container-fluid bg-dark text-white">
    <div class="row">
        <div class="col-md-6">
            <h4 class = "text-uppercase fw-bold">Contact Us</h4>
            <address>
				PT Lulus Amin <br>
				Jl Margonda Raya <br>
				email:lulusamin_at_gmail_dot_com<br>
				website:lulusamin.web.id 
			</address>
        </div>
        <div class="col-md-6 text-center link">
            <h4 class = "text-uppercase fw-bold">Links Account</h4>
            <a href="https://www.facebook.com/ccitftuiofficial" target="_blank"><i class="bi bi-facebook fs-2"></i></a>
            <a href="https://github.com/VirgiFHermawan" target="_blank"><i class="bi bi-github fs-2"></i></a>
            <a href="https://www.instagram.com/ccit_ftui/" target="_blank"><i class="bi bi-instagram fs-2"></i></a>
            <a href="https://twitter.com/ccit_ftui" target="_blank"><i class="bi bi-twitter fs-2"></i></a>
        </div>
    </div>
    <footer class="text-center" style="padding: 5px;" >
        <p>Created with by <u class = "fw-bold" >Kelompok 3 - CEP CCIT FTUI</p>
    </footer>
</div>
<!-- Close Footer -->

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Data Table -->
<script src = "https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src= "https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>
<script src= "https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" ></script>

<script>
        $(document).ready(function() {
            // Fungsi Table
            $('#data').DataTable();
            // Fungsi Table

            // Fungsi Detail
            $('.detail').click(function() {
                var dataSiswa = $(this).attr("data-id");
                $.ajax({
                    url: "detail.php",
                    method: "post",
                    data: {
                        dataSiswa,
                        dataSiswa
                    },
                    success: function(data) {
                        $('#detail-siswa').html(data);
                        $('#detail').modal("show");
                    }
                });
            });
            // Fungsi Detail
        });
    </script>
</body>

</html>