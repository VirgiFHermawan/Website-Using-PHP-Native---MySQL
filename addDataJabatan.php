<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'functionJabatan.php';

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data Jabatan Karyawan berhasil ditambahkan!');
                document.location.href = 'welcomeJabatan.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data Jabatan Karyawan gagal ditambahkan!');
            </script>";
    }
}

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
    <title>Tambah | Data Project | CRUD App PHP</title>
</head>
<body>
    <!-- Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD PHP NATIVE </a>
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
            <h2><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Jabatan Karyawan </h2> 
        </div>
        <hr>
    </div>
    <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nis" class="form-label">Kode Jabatan</label>
                        <input type="number" class="form-control w-50" id="nis" placeholder="Masukkan Kode Jabatan" min="1" name="nis" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                        <input type="text" class="form-control form-control-md w-50" id="nama_jabatan" placeholder="Masukkan Nama Jabatan" name="nama_jabatan" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tugas" class="form-label">Tugas</label>
                        <textarea class="form-control w-50" id="tugas" rows="5" name="tugas" placeholder="Masukkan Tugas" autocomplete="off" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gaji" class="form-label">Gaji</label>
                        <input type="number" class="form-control w-50" id="gaji" placeholder="Masukkan Gaji" name="gaji" autocomplete="off" required>
                    </div>
                    
                    
                    <hr>
                    <a href="welcomeJabatan.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->

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

</body>
</html>