<?php
    // Setup Database
    $server = "localhost";
    $database = "db_aplikasi_persediaan";
    $username = "root";
    $password = "";
    // Koneksi database dengan deklarasi variabel koneksidb
    $koneksidb = mysqli_connect($server, $username, $password, $database);

    if ($koneksidb->connect_error) {
        die("Koneksi gagal: " . $koneksidb->connect_error);
    }
?>