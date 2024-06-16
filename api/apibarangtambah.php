<?php
// Menghubungkan ke database
include "../db_koneksi/koneksidb.php";

// Mengambil data dari request
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

// Menyiapkan respons
$response = array();

// Memeriksa apakah semua kunci ada dalam data yang diterima
if (isset($data['KodeBarang'], $data['Nama'],  $data['KodeSupplier'], $data['Jenis'], $data['Harga'] ,$data['Stok'], $data['Satuan'])) {
    // Mengambil data dari JSON
    $KodeBarang = $data['KodeBarang'];
    $Nama = $data['Nama'];
    $KodeSupplier = $data['KodeSupplier'];
    $Jenis = $data['Jenis'];
    $Harga = $data['Harga'];
    $Stok = $data['Stok'];
    $Satuan = $data['Satuan'];
    $Petugas = 'ADMIN';

    // Query untuk menambahkan data ke tabel tb_barang
    $sql = "INSERT INTO tb_barang (KodeBarang, Nama, KodeSupplier, Jenis, Harga, Stok, Satuan, Petugas) 
            VALUES ('$KodeBarang', '$Nama', '$KodeSupplier', '$Jenis', '$Harga', '$Stok', '$Satuan', '$Petugas')";

    // Menjalankan query
    if ($koneksidb->query($sql) === TRUE) {
        $response = array('status' => 'Berhasil', 'message' => 'Data berhasil ditambahkan');
    } else {
        $response = array('status' => 'Gagal', 'message' => 'Error: ' . $koneksidb->error);
    }
} else {
    // Jika ada kunci yang tidak tersedia dalam data yang diterima
    $response = array('status' => 'Gagal', 'message' => 'Harap lengkapi semua kolom');
}

// Mengubah respons menjadi JSON dan mengirimkannya
header('Content-Type: application/json');
echo json_encode($response);

// Menutup koneksi database
$koneksidb->close();

