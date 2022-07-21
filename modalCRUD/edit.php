<?php
include_once 'koneksi.php';

// update mahasiswa by id
if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $no_hp      = $_POST['no_hp'];
    if (!empty($nim) && !empty($nama) && !empty($alamat) && !empty($no_hp)) {
        echo "<script>alert('Data tidak tidak boleh kosong');</script>";
        echo "<script>location='index.php';</script>";
    } else {
        $update = $koneksi->query("UPDATE mahasiswa SET nim='$nim',nama='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id ='$id'");
        if ($update) {
            echo "<script>alert('Data berhasil diubah');</script>";
            echo "<script>location='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal diubah');</script>";
            echo "<script>location='index.php';</script>";
        }
    }
}