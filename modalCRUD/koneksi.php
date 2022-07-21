<?php
// connetion to database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "akademik";
$koneksi = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}