<?php
include_once 'koneksi.php';

if (isset($_POST['save'])) {
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $no_hp      = $_POST['no_hp'];
    if (empty($nim) && empty($nama) && empty($alamat) && empty($no_hp)) {
        echo "<script>alert('Data tidak boleh kosonng !');</script>";
        echo "<script>location='index.php';</script>";
    } else {
        $insert = $koneksi->query("INSERT INTO mahasiswa (nim,nama,alamat,no_hp) VALUES ('$nim','$nama','$alamat','$no_hp')");
        if ($insert) {
            echo "<script>alert('Data berhasil ditambahkan');</script>";
            echo "<script>location='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan');</script>";
            echo "<script>location='index.php';</script>";
        }
    }
}