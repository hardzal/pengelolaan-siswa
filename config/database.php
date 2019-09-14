<?php

date_default_timezone_set("Asia/Jakarta");

$host = "localhost";
$username = "root";
$password = "";
$database = "latihan_db_sekolah";

$db = mysqli_connect($host, $username, $password, $database);

if (!$db) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}
