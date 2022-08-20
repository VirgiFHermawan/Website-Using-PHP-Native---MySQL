<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "data_projek");

// jika koneksi gagal 
if (!$koneksi) {
    die("<script>alert('Connection Failed.')</script>");
}

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nis = htmlspecialchars($data['kode_karyawan']);
    $nama = htmlspecialchars($data['nama_karyawan']);
    $hadir = htmlspecialchars($data['hadir']);
    $terlambat = htmlspecialchars($data['terlambat']);
    $cuti = htmlspecialchars($data['cuti']);


    $sql = "INSERT INTO absen VALUES ('$nis','$nama','$hadir','$terlambat','$cuti')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nis)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM absen WHERE kode_karyawan = $nis");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nis = $data['kode_karyawan'];
    $nama = htmlspecialchars($data['nama_karyawan']);
    $hadir = htmlspecialchars($data['hadir']);
    $terlambat = htmlspecialchars($data['terlambat']);
    $cuti = htmlspecialchars($data['cuti']);

    $sql = "UPDATE absen SET nama_karyawan = '$nama', hadir = '$hadir',terlambat = '$terlambat',cuti = '$cuti' WHERE kode_karyawan = '$nis'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

