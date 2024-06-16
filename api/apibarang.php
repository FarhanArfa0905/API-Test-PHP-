<?php
// Menghubungkan ke database
include "../db_koneksi/koneksidb.php";

// Menyiapkan respons
$response = array();

// Memeriksa apakah request adalah GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Query untuk membaca semua data barang dari tabel tb_barang
    $sql = "SELECT * FROM tb_barang";

    // Menjalankan query
    $result = $koneksidb->query($sql);

    if ($result->num_rows > 0) {
        // Jika terdapat data barang dalam tabel
        $barang = array();
        while ($row = $result->fetch_assoc()) {
            $barang[] = $row;
        }
        $response = array('status' => 'Berhasil', 'data' => $barang);
    } else {
        // Jika tidak ada data barang dalam tabel
        $response = array('status' => 'Gagal', 'message' => 'Tidak ada data barang');
    }
} else {
    // Jika metode request bukan GET
    $response = array('status' => 'Gagal', 'message' => 'Metode request tidak diizinkan');
}

// Mengubah respons menjadi JSON dan mengirimkannya
header('Content-Type: application/json');
echo json_encode($response);

// Menutup koneksi database
$koneksidb->close();

