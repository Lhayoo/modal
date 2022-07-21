<?php
include_once 'koneksi.php';

// delete database by id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM mahasiswa WHERE nim = '$id'";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>location='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
        echo "<script>location='delete.php';</script>";
    }
}