<?php
session_start();
// // Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
// Memanggil atau membutuhkan file function.php
require 'functionHadir.php';

// Mengambil data dari nis dengan fungsi get
$nis = $_GET['kode_karyawan'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapus($nis) > 0) {
    echo "<script>
                alert('Data Hadir Karyawan berhasil dihapus!');
                document.location.href = 'welcomeHadir.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data Hadir Karyawan gagal dihapus!');
        </script>";
}
