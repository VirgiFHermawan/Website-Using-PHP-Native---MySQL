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

    $nis = htmlspecialchars($data['kode_jabatan']);
    $nama = htmlspecialchars($data['nama_jabatan']);
    $tugas = htmlspecialchars($data['tugas']);
    $gaji = htmlspecialchars($data['gaji']);


    $sql = "INSERT INTO jabatan VALUES ('$nis','$nama','$tugas','$gaji')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nis)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM jabatan WHERE kode_jabatan = $nis");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nis = $data['kode_jabatan'];
    $nama = htmlspecialchars($data['nama_jabatan']);
    $tugas = htmlspecialchars($data['tugas']);
    $gaji = htmlspecialchars($data['gaji']);

    $sql = "UPDATE jabatan SET nama_jabatan = '$nama', tugas = '$tugas',gaji = '$gaji' WHERE kode_jabatan = '$nis'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

