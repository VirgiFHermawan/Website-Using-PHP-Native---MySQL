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
    $umur = htmlspecialchars($data['umur']);
    $jekel = $data['jekel'];
    $alamat = htmlspecialchars($data['alamat']);


    $sql = "INSERT INTO karyawan VALUES ('$nis','$nama','$umur','$jekel','$alamat')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nis)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM karyawan WHERE kode_karyawan = $nis");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nis = $data['kode_karyawan'];
    $nama = htmlspecialchars($data['nama_karyawan']);
    $umur = htmlspecialchars($data['umur']);
    $jekel = $data['jekel'];
    $alamat = htmlspecialchars($data['alamat']);

    $sql = "UPDATE karyawan SET nama_karyawan = '$nama', umur = '$umur',jekel = '$jekel',alamat = '$alamat' WHERE kode_karyawan = '$nis'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

